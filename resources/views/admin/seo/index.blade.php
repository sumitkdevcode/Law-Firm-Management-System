@extends('layouts.admin')

@section('title', 'SEO Management')

@section('content')
    <div class="page-header">
        <h2 class="page-title">SEO Management</h2>
        <a href="{{ route('admin.seo.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Page SEO
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Page-wise SEO Settings</h3>
            <span style="color: #666; font-size: 0.9rem;">Manage meta tags for each page URL</span>
        </div>
        <div class="card-body" style="padding: 0;">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Page Name</th>
                            <th>URL</th>
                            <th>Meta Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($seoPages as $seo)
                            <tr>
                                <td>
                                    <strong>{{ $seo->page_name }}</strong>
                                    @if($seo->no_index)
                                        <span class="badge badge-warning" style="margin-left: 5px;">noindex</span>
                                    @endif
                                </td>
                                <td>
                                    <code
                                        style="background: #f1f1f1; padding: 3px 8px; border-radius: 4px; font-size: 0.85rem;">
                                        {{ $seo->page_url }}
                                    </code>
                                </td>
                                <td>
                                    @if($seo->meta_title)
                                        {{ Str::limit($seo->meta_title, 35) }}
                                        <br>
                                        <small style="color: {{ strlen($seo->meta_title) > 60 ? '#dc3545' : '#28a745' }};">
                                            {{ strlen($seo->meta_title) }}/60 chars
                                        </small>
                                    @else
                                        <span style="color: #999;">Not set</span>
                                    @endif
                                </td>
                                <td>
                                    @if($seo->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.seo.edit', $seo) }}" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.seo.destroy', $seo) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 40px;">
                                    <i class="fas fa-search" style="font-size: 2rem; color: #ccc; margin-bottom: 10px;"></i>
                                    <p>No SEO pages configured yet.</p>
                                    <a href="{{ route('admin.seo.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Add First Page
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $seoPages->links() }}

    <!-- Quick Guide -->
    <div class="card" style="margin-top: 30px;">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-lightbulb" style="color: #c9a227;"></i> SEO Best Practices</h3>
        </div>
        <div class="card-body">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                <div>
                    <h4 style="font-size: 1rem; margin-bottom: 10px;">Meta Title</h4>
                    <p style="color: #666; font-size: 0.9rem; margin: 0;">
                        Keep under <strong>60 characters</strong>. Include primary keyword. Make it compelling and unique.
                    </p>
                </div>
                <div>
                    <h4 style="font-size: 1rem; margin-bottom: 10px;">Meta Description</h4>
                    <p style="color: #666; font-size: 0.9rem; margin: 0;">
                        Keep under <strong>160 characters</strong>. Summarize page content. Include a call-to-action.
                    </p>
                </div>
                <div>
                    <h4 style="font-size: 1rem; margin-bottom: 10px;">URL Format</h4>
                    <p style="color: #666; font-size: 0.9rem; margin: 0;">
                        Use exact page paths like <code>/</code>, <code>/about</code>, <code>/services</code>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection