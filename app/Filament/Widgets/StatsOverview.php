<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        $user = Auth::user();
        $stats = [];
        
        // Stats untuk Total Views berdasarkan role
        if ($user->hasRole(['super_admin', 'validator'])) {
            // Jika super_admin atau validator, tampilkan semua views
            $totalViews = Post::sum('views');
        } else {
            // Jika author, tampilkan views dari post mereka saja
            $totalViews = Post::where('author_id', $user->id)->sum('views');
        }
        
        $stats[] = Stat::make('Total Views', $totalViews)
            ->description('Total posts read')
            ->descriptionIcon('heroicon-m-eye')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3])
            ->color('success');
            
        // Stats untuk Total Posts
        if ($user->hasRole(['super_admin', 'validator'])) {
            $totalPosts = Post::count();
        } else {
            $totalPosts = Post::where('author_id', $user->id)->count();
        }
        
        $stats[] = Stat::make('Total Posts', $totalPosts)
            ->description('Total posts published')
            ->descriptionIcon('heroicon-m-document-text')
            ->chart([4, 3, 6, 2, 3, 5, 4, 3])
            ->color('primary');
            
        // Stats untuk Categories hanya untuk super_admin dan validator
        if ($user->hasRole(['super_admin', 'validator'])) {
            $stats[] = Stat::make('Total Categories', Category::count())
                ->description('Post Categories')
                ->descriptionIcon('heroicon-m-square-2-stack')
                ->chart([3, 5, 2, 4, 6, 3, 4, 3])
                ->color('warning');
        }
        
        return $stats;
    }
}