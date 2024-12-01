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
use Illuminate\Support\Facades\Storage;

class PostResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Menu';
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\RichEditor::make('body')
                ->required()
                ->columnSpanFull(),
            Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),
            Forms\Components\ToggleButtons::make('status')
                ->options([
                    'draft' => 'Draft',
                    'published' => 'Publish',
                ])
                ->default('draft')
                ->disabled(fn ($state, $record) => Auth::user()->hasRole('author')),
            Forms\Components\FileUpload::make('thumbnail')
                ->maxSize(2048)
                ->disk('public')
                ->directory('thumbnails')
                ->image()
                ->afterStateUpdated(function (?string $state, ?string $old, callable $set) {
                    // Cek apakah ada nilai lama untuk thumbnail
                    if ($old && $old !== $state) {
                        // Jika thumbnail lama ada dan berbeda dengan nilai baru, hapus gambar lama
                        $oldThumbnailPath = public_path('storage/'.$old);
                        if (file_exists($oldThumbnailPath)) {
                            unlink($oldThumbnailPath); // Hapus gambar lama
                        }
                    }

                    // Jika gambar baru diupload, Filament secara otomatis akan menyimpan gambar tersebut
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        
        ->modifyQueryUsing(function (Builder $query) {
            if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('validator') ) {
                return $query; // Admin melihat semua data
            }
        
            return $query->where('author_id', Auth::id()); // Author hanya melihat postingannya sendiri
        })
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
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
            ])
            ->filters([
                //
                    ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function ($record) {
                        $thumbpath = public_path('storage/'.$record->thumbnail);
                        $richpath = public_path('storage/'.$record->thumbnail);
                        if (file_exists($thumbpath) || file_exists($richpath)) {
                            unlink($thumbpath);
                        }

                        $record->delete();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->after(function ($records) {
                        foreach ($records as $record) {
                            // Ambil path gambar yang terhubung
                            $thumbpath = public_path('storage/'.$record->thumbnail);

                            // Hapus gambar jika ada
                            if (file_exists($thumbpath)) {
                                unlink($thumbpath); // Hapus gambar
                            }

                            // Hapus record
                            $record->delete();
                        }
                    }),
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
            'update_status'
        ];
    }
}
