@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(201, 162, 39, 0.1); color: #c9a227;">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-value">{{ $stats['new_contacts'] }}</div>
            <div class="stat-label">New Inquiries</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(40, 167, 69, 0.1); color: #28a745;">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="stat-value">{{ $stats['cases'] }}</div>
            <div class="stat-label">Total Cases</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(0, 123, 255, 0.1); color: #007bff;">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-value">{{ $stats['published_posts'] }}</div>
            <div class="stat-label">Published Posts</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(111, 66, 193, 0.1); color: #6f42c1;">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">{{ $stats['team_members'] }}</div>
            <div class="stat-label">Team Members</div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <!-- Recent Contacts -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Inquiries</h3>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-secondary">View All</a>
            </div>
            <div class="card-body" style="padding: 0;">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentContacts as $contact)
                                <tr>
                                    <td>
                                        <strong>{{ $contact->name }}</strong><br>
                                        <small style="color: #666;">{{ $contact->email }}</small>
                                    </td>
                                    <td>{{ Str::limit($contact->subject, 30) }}</td>
                                    <td>
                                        <span class="badge badge-{{ $contact->status_badge }}">
                                            {{ ucfirst($contact->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center; padding: 30px;">No inquiries yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Blog Posts</h3>
                <a href="{{ route('admin.blog.posts.index') }}" class="btn btn-sm btn-secondary">View All</a>
            </div>
            <div class="card-body" style="padding: 0;">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPosts as $post)
                                <tr>
                                    <td>{{ Str::limit($post->title, 35) }}</td>
                                    <td>
                                        @if($post->is_published)
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->views }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center; padding: 30px;">No posts yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-top: 30px;">
        <div class="card" style="padding: 25px; text-align: center;">
            <i class="fas fa-gavel" style="font-size: 2rem; color: #c9a227; margin-bottom: 15px;"></i>
            <div style="font-size: 1.5rem; font-weight: 700;">{{ $stats['practice_areas'] }}</div>
            <div style="color: #666;">Practice Areas</div>
        </div>
        <div class="card" style="padding: 25px; text-align: center;">
            <i class="fas fa-quote-right" style="font-size: 2rem; color: #c9a227; margin-bottom: 15px;"></i>
            <div style="font-size: 1.5rem; font-weight: 700;">{{ $stats['testimonials'] }}</div>
            <div style="color: #666;">Testimonials</div>
        </div>
        <div class="card" style="padding: 25px; text-align: center;">
            <i class="fas fa-envelope" style="font-size: 2rem; color: #c9a227; margin-bottom: 15px;"></i>
            <div style="font-size: 1.5rem; font-weight: 700;">{{ $stats['contacts'] }}</div>
            <div style="color: #666;">Total Contacts</div>
        </div>
        <div class="card" style="padding: 25px; text-align: center;">
            <i class="fas fa-file-alt" style="font-size: 2rem; color: #c9a227; margin-bottom: 15px;"></i>
            <div style="font-size: 1.5rem; font-weight: 700;">{{ $stats['posts'] }}</div>
            <div style="color: #666;">Total Posts</div>
        </div>
    </div>
@endsection