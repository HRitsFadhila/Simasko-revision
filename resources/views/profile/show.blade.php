@extends('layouts.app')

@section('title', 'Profil')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Profil</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link @if (request('pills') != 'password') active @endif" href="{{ route('profile.show') }}">Profil</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade @if (request('pills') != 'password') active @endif show active" id="profil" role="tabpanel" aria-labelledby="profil-tab"></div>
                @includeIf('profile.update-profile-information-form')
    </div>
</div>

@endsection