@extends('admin.layouts.app')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors as $error)
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        </div>
    @endif

    @if (session('contact_delete_msg'))
        <div class="alert alert-success">
            {{ session('contact_delete_msg') }}
        </div>
    @endif

    <h2 class="mb-3">Contact Messages</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTableContacts" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Sender</th>
                            <th>Message</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Sender</th>
                            <th>Message</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (!empty($contacts))
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>
                                        <Strong>{{ $contact->name }}</Strong>
                                        <small><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></small>
                                    </td>
                                    <td>
                                        <strong class="d-block mb-2"><em>Subject: </em>{{ $contact->subject }}</strong>
                                        <div class="mb-2">{{ $contact->message }}</div>
                                        <small class=""><em>Data Time:  {{ $contact->created_at }}</em></small> 
                                        
                                        <a href="javascript:void(0)" class="contact-read contact-read-{{ $contact->id }} text-decoration-none ml-2 {{ $contact->read == 1 ? 'd-none' : '' }}" data-id="{{ $contact->id }}">Mark as read <i class="far fa-check-circle fa-sm"></i></a>
                                        <a href="javascript:void(0)" class="contact-unread contact-unread-{{ $contact->id }} text-decoration-none ml-2 text-danger {{ $contact->read == 0 ? 'd-none' : '' }}" data-id="{{ $contact->id }}">Mark as unread <i class="far fa-times-circle fa-sm"></i></a>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['contacts.destroy', $contact->id]]) !!}
                                        {!! Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTableContacts').DataTable({order:[[0,"desc"]]});
        });


        $('.contact-read').click(function(){
            var contactId = $(this).data('id');
            var url ='/admin/contacts/'+contactId;
            axios.put(url, {
                read: 1,
            })
            .then(res => {
                if (res.status == 200) {
                    if (res.data == 1) {
                        $('.contact-read-'+contactId).addClass('d-none');
                        $('.contact-unread-'+contactId).removeClass('d-none');
                        toastr.success('Marked as read');
                    } else {
                        toastr.error('Update failed');
                    }
                } else {
                    toastr.error('Update failed');
                }
            })
            .catch(err => {
                toastr.error(err);
            })
        });

        $('.contact-unread').click(function(){
            var contactId = $(this).data('id');
            var url ='/admin/contacts/'+contactId;
            axios.put(url, {
                read: 0,
            })
            .then(res => {
                if (res.status == 200) {
                    if (res.data == 1) {
                        $('.contact-unread-'+contactId).addClass('d-none');
                        $('.contact-read-'+contactId).removeClass('d-none');
                        toastr.success('Marked as unread');
                    } else {
                        toastr.error('Update failed');
                    }
                } else {
                    toastr.error('Update failed');
                }
            })
            .catch(err => {
                toastr.error(err);
            })
        });

        


    </script>
@endsection