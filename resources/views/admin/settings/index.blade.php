@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Site Settings</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf

                <h4 style="margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #c9a227;">General Information
                </h4>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Site Name</label>
                        <input type="text" name="site_name" class="form-control"
                            value="{{ $settings['site_name'] ?? 'LegalPro' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Site Tagline</label>
                        <input type="text" name="site_tagline" class="form-control"
                            value="{{ $settings['site_tagline'] ?? '' }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Lawyer Name</label>
                        <input type="text" name="lawyer_name" class="form-control"
                            value="{{ $settings['lawyer_name'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Lawyer Title</label>
                        <input type="text" name="lawyer_title" class="form-control"
                            value="{{ $settings['lawyer_title'] ?? '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">About Short Description</label>
                    <textarea name="about_short" class="form-control"
                        rows="3">{{ $settings['about_short'] ?? '' }}</textarea>
                </div>

                <h4 style="margin: 30px 0 20px; padding-bottom: 10px; border-bottom: 2px solid #c9a227;">Contact Information
                </h4>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $settings['email'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $settings['phone'] ?? '' }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="2">{{ $settings['address'] ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Working Hours</label>
                        <input type="text" name="working_hours" class="form-control"
                            value="{{ $settings['working_hours'] ?? '' }}" placeholder="Mon-Fri: 9AM-6PM">
                    </div>
                </div>

                <h4 style="margin: 30px 0 20px; padding-bottom: 10px; border-bottom: 2px solid #c9a227;">Social Media</h4>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Facebook URL</label>
                        <input type="url" name="facebook" class="form-control" value="{{ $settings['facebook'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Twitter URL</label>
                        <input type="url" name="twitter" class="form-control" value="{{ $settings['twitter'] ?? '' }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">LinkedIn URL</label>
                        <input type="url" name="linkedin" class="form-control" value="{{ $settings['linkedin'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Instagram URL</label>
                        <input type="url" name="instagram" class="form-control" value="{{ $settings['instagram'] ?? '' }}">
                    </div>
                </div>

                <h4 style="margin: 30px 0 20px; padding-bottom: 10px; border-bottom: 2px solid #c9a227;">SEO Settings</h4>

                <div class="form-group">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $settings['meta_title'] ?? '' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control"
                        rows="2">{{ $settings['meta_description'] ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Footer Text</label>
                    <textarea name="footer_text" class="form-control"
                        rows="2">{{ $settings['footer_text'] ?? '' }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Settings
                </button>
            </form>
        </div>
    </div>
@endsection