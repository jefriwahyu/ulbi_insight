<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Table;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PostResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Menu';
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Hitung jumlah Post yang dimiliki oleh user yang sedang login
        if ($user->hasRole('author')) {
            $postCount = Post::where('author_id', $user->id)->count();
        } else {
            $postCount = Post::count(); 
        }

        // Kembalikan jumlah Post sebagai string untuk badge
        return (string) $postCount;
    }

    public static function form(Form $form): Form
    {
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
                ->relationship('category', 'name')
                ->required(),
            Forms\Components\ToggleButtons::make('status')
                ->options(function () {
                    $user = Auth::user();
            
                    // Jika role adalah author, hanya berikan opsi draft dan revision
                    if ($user->hasRole('author')) {
                        return [
                            'draft' => 'Draft',
                            'revision' => 'Revision',
                        ];
                    }
            
                    // Jika bukan author, tampilkan semua opsi
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
                ->default('draft'),
            Forms\Components\FileUpload::make('thumbnail')
                ->maxSize(2048)
                ->disk('public')
                ->directory('thumbnails')
                ->image(),
            Forms\Components\Textarea::make('feedback')
                ->placeholder('Belum ada feedback....')
                ->hidden(fn ($state, $record) => Auth::user()->hasRole('author')),
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
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('author.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn($state): string => str()->headline($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'revision' => 'primary',
                        'published' => 'success',
                        'rejected' => 'danger',
                    })
                    ->default('draft'),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('feedback')
                    ->tooltip(fn ($record) => $record->feedback)
                    ->words(5)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])
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
            // 'view' => Pages\ViewPost::route('/{record}'),
            // 'edit' => Pages\EditPost::route('/{record}/edit'),
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
