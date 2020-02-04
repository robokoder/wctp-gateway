@extends('layouts.app')
@section('title', __('Analytics'))
@push('css')
@endpush
@push('scripts')
@endpush

@section('content')
    @include('layouts.error')
    @include('layouts.status')

    <h5 class="text-muted-light mt-2 mt-md-0">
        {{ __('Messages') }}
        @if( request('page') )
            &middot; Page {{ request('page') }}
        @endif
    </h5>

    <div class="card py-0 my-0 mx-0">
        <div class="card-body p-0 m-0">

            <div class="table-responsive text-left">
                <table class="table table-striped table-hover m-0">
                    <thead>
                    <tr class="text-center">
                        <th class="font-weight-bold text-muted-light w-25">{{ __('Timestamp') }}</th>
                        <th class="font-weight-bold text-muted-light w-25">{{ __('From') }}</th>
                        <th class="font-weight-bold text-muted-light w-25">{{ __('To') }}</th>
                        <th class="font-weight-bold text-muted-light text-left w-25">{{ __('Status') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if( $messages->count() )
                        @foreach( $messages as $message )
                            <tr class="align-text-bottom">
                                <td class="text-muted text-small font-weight-bold text-nowrap">
                                    {{ $message->created_at->timezone( Auth::user()->timezone )->format('m/d/Y g:i:s A T') }}
                                </td>
                                <td class=" text-truncate text-center">
                                   {{ $message->from }}
                                </td>
                                <td class=" align-text-bottom">
                                    {{ $message->to }}
                                </td>
                                <td class="text-truncate text-muted text-small">
                                    <a href="#" data-toggle="modal" data-target="#detailsMessageModal{{ $message->id}}" ><i class="fas fa-search text-muted-light"></i></a>
                                    {{ $message->status }}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-muted text-center text-small font-weight-bold">
                                <i class="fas fa-ban text-muted-light"></i> No messages found
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row col my-4">
        {{ $messages->links() }}
    </div>

    @foreach( $messages as $message )
        @include('analytics.modals.details')
    @endforeach

@endsection