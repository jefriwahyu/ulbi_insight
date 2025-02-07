<?php

namespace App\Filament\Widgets;

use App\Models\Post;
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

        // 📌 Jika user adalah validator, hanya tampilkan "Total Posts Published" & "Total Posts Submitted"
        if ($user->hasRole('validator')) {
            $totalPublished = Post::where('status', 'published')->count();
            $totalSubmitted = Post::where('status', 'submitted')->count();

            $stats[] = Stat::make('Total Posts Published', $totalPublished)
                ->description('Total posts that have been published')
                ->descriptionIcon('heroicon-m-document-check')
                ->chart([4, 3, 6, 2, 3, 5, 4, 3])
                ->color('primary');

            $stats[] = Stat::make('Total Posts Submitted', $totalSubmitted)
                ->description('Total posts awaiting review')
                ->descriptionIcon('heroicon-m-clock')
                ->chart([3, 5, 2, 4, 6, 3, 4, 3])
                ->color('info');

            return $stats; // Kembalikan stats khusus validator
        }

        // 📌 Jika user adalah author, tampilkan "Total Views", "Total Posts Published", "Total Posts Submitted", & "Total Posts Revision"
        if ($user->hasRole('author')) {
            $totalViews = Post::where('author_id', $user->id)->sum('views');
            $totalPublished = Post::where('author_id', $user->id)->where('status', 'published')->count();
            $totalSubmitted = Post::where('author_id', $user->id)->where('status', 'submitted')->count();
            $totalRevision = Post::where('author_id', $user->id)->where('status', 'revision')->count(); // Tambahan stats revision
            $totalRejected = Post::where('author_id', $user->id)->where('status', 'rejected')->count(); // Tambahan stats rejected

            $stats[] = Stat::make('Total Views', $totalViews)
                ->description('Total views from your posts')
                ->descriptionIcon('heroicon-m-eye')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3])
                ->color('primary');

            $stats[] = Stat::make('Total Posts Published', $totalPublished)
                ->description('Total posts you have published')
                ->descriptionIcon('heroicon-m-document-check')
                ->chart([4, 3, 6, 2, 3, 5, 4, 3])
                ->color('success');


            $stats[] = Stat::make('Total Posts Revision', $totalRevision)
                ->description('Total posts under revision')
                ->descriptionIcon('heroicon-m-pencil')
                ->chart([2, 4, 3, 5, 6, 3, 5, 4]) // Chart dummy untuk tampilan
                ->color('warning');

            $stats[] = Stat::make('Total Posts Submitted', $totalSubmitted)
                ->description('Total posts you have submitted')
                ->descriptionIcon('heroicon-m-clock')
                ->chart([3, 5, 2, 4, 6, 3, 4, 3])
                ->color('info');

            $stats[] = Stat::make('Total Posts Rejected', $totalRejected)
                ->description('Total posts you have rejected')
                ->descriptionIcon('heroicon-o-x-circle')
                ->chart([2, 4, 3, 5, 6, 3, 5, 4]) // Chart dummy untuk tampilan
                ->color('danger');

            return $stats; // Kembalikan stats khusus author
        }

        // 📌 Jika user adalah super_admin, tampilkan semua stats
        if ($user->hasRole('super_admin')) {
            $totalViews = Post::sum('views');
            $totalPublished = Post::where('status', 'published')->count();
            $totalSubmitted = Post::where('status', 'submitted')->count();
            $totalRevision = Post::where('status', 'revision')->count();

            $stats[] = Stat::make('Total Views', $totalViews)
                ->description('Total posts read')
                ->descriptionIcon('heroicon-m-eye')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3])
                ->color('primary');

            $stats[] = Stat::make('Total Posts Published', $totalPublished)
                ->description('Total posts published')
                ->descriptionIcon('heroicon-m-document-check')
                ->chart([4, 3, 6, 2, 3, 5, 4, 3])
                ->color('success');

            $stats[] = Stat::make('Total Posts Submitted', $totalSubmitted)
                ->description('Total posts awaiting review')
                ->descriptionIcon('heroicon-m-clock')
                ->chart([3, 5, 2, 4, 6, 3, 4, 3])
                ->color('info');

            $stats[] = Stat::make('Total Posts Revision', $totalRevision)
                ->description('Total posts under revision')
                ->descriptionIcon('heroicon-m-pencil')
                ->chart([2, 4, 3, 5, 6, 3, 5, 4])
                ->color('primary');
        }

        return $stats;
    }
}
