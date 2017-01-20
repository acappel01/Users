@extends('core::admin.master')

@section('title', __('users::global.name'))

@section('main')

<div ng-app="typicms" ng-cloak ng-controller="ListController">

    @include('core::admin._button-create', ['module' => 'users'])

    <h1>@lang('users::global.name')</h1>

    <div class="btn-toolbar">
        @include('core::admin._lang-switcher')
    </div>

    <div class="table-responsive">

        <table st-persist="usersTable" st-table="displayedModels" st-safe-src="models" st-order st-filter class="table table-condensed table-main">
            <thead>
                <tr>
                    <th class="delete"></th>
                    <th class="edit"></th>
                    <th st-sort="first_name" class="first_name st-sort">{{ __('First name') }}</th>
                    <th st-sort="last_name" class="last_name st-sort">{{ __('Last name') }}</th>
                    <th st-sort="email" class="email st-sort">{{ __('Email') }}</th>
                    <th st-sort="activated" class="activated st-sort">{{ __('Activated') }}</th>
                    <th st-sort="superuser" class="superuser st-sort">{{ __('Superuser') }}</th>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="3">
                        <input st-search class="form-control input-sm" placeholder="@lang('global.Search')…" type="text">
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="model in displayedModels">
                    <td typi-btn-delete action="delete(model, model.first_name + ' ' + model.last_name)"></td>
                    <td>
                        @include('core::admin._button-edit', ['module' => 'users'])
                    </td>
                    <td>@{{ model.first_name }}</td>
                    <td>@{{ model.last_name }}</td>
                    <td>@{{ model.email }}</td>
                    <td>@{{ model.activated }}</td>
                    <td>@{{ model.superuser }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" typi-pagination></td>
                </tr>
            </tfoot>
        </table>

    </div>

</div>

@endsection
