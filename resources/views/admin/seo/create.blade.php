@extends('layouts.admin')

@section('title', 'Add Page SEO')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Add Page SEO</h2>
        <a href="{{ route('admin.seo.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.seo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
            <!-- Main Content -->
            <div>
                <!-- Basic Info -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Page Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Page Name *</label>
                                <input type="text" name="page_name" class="form-control" value="{{ old('page_name') }}"
                                    placeholder="e.g., Home Page, About Us" required>
                                @error('page_name')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Page URL *</label>
                                <input type="text" name="page_url" class="form-control" value="{{ old('page_url') }}"
                                    placeholder="e.g., /, /about, /services" required>
                                <small style="color: #666;">Enter the URL path (e.g., / for home, /about for about
                                    page)</small>
                                @error('page_url')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Meta Tags -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <h3 class="card-title">Meta Tags</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}"
                                maxlength="70" id="metaTitle">
                            <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                                <small style="color: #666;">Recommended: 50-60 characters</small>
                                <small id="titleCount" style="color: #28a745;">0/60</small>
                            </div>
                            @error('meta_title')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3" maxlength="160"
                                id="metaDesc">{{ old('meta_description') }}</textarea>
                            <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                                <small style="color: #666;">Recommended: 150-160 characters</small>
                                <small id="descCount" style="color: #28a745;">0/160</small>
                            </div>
                            @error('meta_description')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}"
                                placeholder="keyword1, keyword2, keyword3">
                            <small style="color: #666;">Comma-separated keywords (optional, less important for modern
                                SEO)</small>
                        </div>
                    </div>
                </div>

                <!-- Open Graph -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <h3 class="card-title">Open Graph (Social Media)</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">OG Title</label>
                            <input type="text" name="og_title" class="form-control" value="{{ old('og_title') }}"
                                placeholder="Leave empty to use Meta Title">
                        </div>

                        <div class="form-group">
                            <label class="form-label">OG Description</label>
                            <textarea name="og_description" class="form-control" rows="2"
                                placeholder="Leave empty to use Meta Description">{{ old('og_description') }}</textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">OG Image</label>
                                <input type="file" name="og_image" class="form-control" accept="image/*">
                                <small style="color: #666;">Recommended: 1200x630 pixels</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Twitter Card Type</label>
                                <select name="twitter_card" class="form-control">
                                    <option value="summary_large_image">Summary Large Image</option>
                                    <option value="summary">Summary</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Advanced -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <h3 class="card-title">Advanced Settings</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Canonical URL</label>
                            <input type="url" name="canonical_url" class="form-control" value="{{ old('canonical_url') }}"
                                placeholder="https://example.com/page">
                            <small style="color: #666;">Specify the preferred URL to avoid duplicate content</small>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Custom Head Scripts</label>
                            <textarea name="custom_head_scripts" class="form-control" rows="4"
                                placeholder="<!-- Analytics, tracking codes, etc. -->">{{ old('custom_head_scripts') }}</textarea>
                            <small style="color: #666;">Add custom scripts to be placed in the &lt;head&gt; tag for this
                                page only</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <!-- Publish -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Publishing</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <span>Active</span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                            <i class="fas fa-save"></i> Save SEO Settings
                        </button>
                    </div>
                </div>

                <!-- Robots -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <h3 class="card-title">Search Indexing</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-check">
                                <input type="checkbox" name="no_index" value="1" {{ old('no_index') ? 'checked' : '' }}>
                                <span>No Index</span>
                            </label>
                            <small style="color: #666; display: block; margin-top: 5px;">
                                Prevents this page from appearing in search results
                            </small>
                        </div>

                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-check">
                                <input type="checkbox" name="no_follow" value="1" {{ old('no_follow') ? 'checked' : '' }}>
                                <span>No Follow</span>
                            </label>
                            <small style="color: #666; display: block; margin-top: 5px;">
                                Tells search engines not to follow links on this page
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Preview -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <h3 class="card-title">Preview</h3>
                    </div>
                    <div class="card-body">
                        <div
                            style="background: #f8f9fa; padding: 15px; border-radius: 8px; font-family: Arial, sans-serif;">
                            <div style="color: #1a0dab; font-size: 1.1rem; margin-bottom: 5px;" id="previewTitle">
                                Page Title - Site Name
                            </div>
                            <div style="color: #006621; font-size: 0.85rem; margin-bottom: 5px;" id="previewUrl">
                                https://yoursite.com/page
                            </div>
                            <div style="color: #545454; font-size: 0.9rem;" id="previewDesc">
                                Meta description will appear here...
                            </div>
                        </div>
                        <small style="color: #666; margin-top: 10px; display: block;">
                            <i class="fas fa-info-circle"></i> This is how your page might appear in Google
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script>
            // Character counters
            const metaTitle = document.getElementById('metaTitle');
            const metaDesc = document.getElementById('metaDesc');
            const titleCount = document.getElementById('titleCount');
            const descCount = document.getElementById('descCount');
            const previewTitle = document.getElementById('previewTitle');
            const previewDesc = document.getElementById('previewDesc');
            const previewUrl = document.getElementById('previewUrl');

            function updateCount(input, counter, max) {
                const len = input.value.length;
                counter.textContent = `${len}/${max}`;
                counter.style.color = len > max * 0.9 ? '#dc3545' : (len > max * 0.7 ? '#ffc107' : '#28a745');
            }

            metaTitle.addEventListener('input', function () {
                updateCount(this, titleCount, 60);
                previewTitle.textContent = this.value || 'Page Title - Site Name';
            });

            metaDesc.addEventListener('input', function () {
                updateCount(this, descCount, 160);
                previewDesc.textContent = this.value || 'Meta description will appear here...';
            });

            document.querySelector('[name="page_url"]').addEventListener('input', function () {
                previewUrl.textContent = 'https://yoursite.com' + (this.value.startsWith('/') ? '' : '/') + this.value;
            });

            // Initialize
            updateCount(metaTitle, titleCount, 60);
            updateCount(metaDesc, descCount, 160);
        </script>
    @endpush
@endsection