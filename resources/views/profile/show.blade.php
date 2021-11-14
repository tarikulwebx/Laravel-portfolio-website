@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('profile_update_msg'))
            <div class="alert alert-success">
                {{ session('profile_update_msg') }}
            </div>
        @endif
        
        <h2 class="mb-4">Account Profile</h2>

        <div class="row">
            <div class="col-md-4 col-xl-3">
                <img src="{{ $user_profile->photo ? $user_profile->photo->name : 'https://via.placeholder.com/300?text=No+Image' }}" class="img-fluid rounded-circle" alt="">
            </div>
            <div class="col-md-8 col-xl-9">
                <h3 class="mb-1">{{ $user_profile->name }}</h3>
                <small class="mb-4 d-block">{{ $user_profile->email }}</small>

                <table class="table table-borderless table-striped mb-3">
                    <tr>
                        <td>Role</td>
                        <td>{{ Str::ucfirst($user_profile->role->name) }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @if ($user_profile->is_active == 0)
                                <i class="fas fa-dot-circle text-muted" style="font-size: 11px;"></i>
                                Not Activated
                                
                                @else
                                    <i class="fas fa-dot-circle text-success" style="font-size: 11px;"></i>
                                    Activated
                            @endif
                            
                        </td> 
                    </tr>
                    <tr>
                        <td>Profile created</td>
                        <td>{{ $user_profile->created_at->diffForHumans() }}</td>
                    </tr>
                    <tr>
                        <td>Profile updated</td>
                        <td>{{ $user_profile->updated_at->diffForHumans() }}</td>
                    </tr>
                    
                </table>
                <a href="{{ route('edit-profile', $user_profile->slug) }}" class="btn btn-orange">Edit Profile</a>

            </div>
        </div>
    </div>

    


@endsection