<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PostResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Menu';
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $user = Auth::user();
        
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\RichEditor::make('body')
                ->required()
                ->columnSpanFull()
                ->fileAttachmentsDisk('public')
                ->fileAttachmentsDirectory('attachments'),
            Forms\Components\Select::make('category_id')
                ->relationship('category', 'name', fn ($query) => $query->where('status', 'active'))
                ->required(),
            Forms\Components\ToggleButtons::make('status')
                ->options(function () use ($user) {
                    if ($user->hasRole('author')) {
                        return [
                            'draft' => 'Draft',
                            'revision' => 'Revision',
                        ];
                    }
            
                    return [
                        'draft' => 'Draft',
                        'revision' => 'Revision',
                        'published' => 'Publish',
                        'rejected' => 'Reject',
                    ];
                })
                ->colors([
                    'draft' => 'gray',
                    'revision' => 'primary',
                    'published' => 'success',
                    'rejected' => 'danger',
                ])
                ->icons([
                    'draft' => 'heroicon-o-pencil',
                    'revision' => 'heroicon-o-arrow-path',
                    'published' => 'heroicon-o-check-circle',
                    'rejected' => 'heroicon-o-x-circle',
                ])
                ->inline()
                ->default('draft')
                ->live(),
            Forms\Components\FileUpload::make('thumbnail')
                ->maxSize(2048)
                ->disk('public')
                ->directory('thumbnails')
                ->image(),
            Forms\Components\Textarea::make('feedback')
                ->placeholder('Belum ada feedback....')
                ->hidden(function ($get) use ($user) {
                    // Sembunyikan jika user adalah author
                    if ($user->hasRole('author')) {
                        return true;
                    }
                    
                    // Tampilkan hanya jika user adalah super_admin atau validator
                    // DAN status adalah rejected
                    return !($user->hasRole(['super_admin', 'validator']) && $get('status') === 'rejected');
                }),
            Forms\Components\Toggle::make('is_featured')
                ->onIcon('heroicon-s-check')
                ->offIcon('heroicon-s-x-mark')
                ->onColor('success')
                ->offColor('danger')
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                if (!Auth::user()->hasRole('author')) {
                    return $query;
                }

                return $query->where('author_id', Auth::id()); // Author hanya melihat postingannya sendiri
            })
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->limit(20)
                    ->sortable(),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('author.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn($state): string => str()->headline($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'revision' => 'primary',
                        'published' => 'success',
                        'rejected' => 'danger',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'draft' => 'heroicon-o-pencil',
                        'revision' => 'heroicon-o-arrow-path',
                        'published' => 'heroicon-o-check-circle',
                        'rejected' => 'heroicon-o-x-circle',
                    })
                    ->alignCenter()
                    ->default('draft'),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since()
                    ->sortable(),
                Tables\Columns\TextColumn::make('feedback')
                    ->tooltip(fn ($record) => $record->feedback)
                    ->words(5),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->alignCenter(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ])
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }
}