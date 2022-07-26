@extends('front.layouts.master')
@section('title','İletişim')
@section('content')
    <div class="container py-4 my-5">
        <div class="row">
            <div class="col-lg-5 col-md-8">
                <form class="search-form" action="#">
                    <div class="input-group">
                        <input type="search" class="form-control bg-transparent shadow-none rounded-0" placeholder="Search here">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <span class="fas fa-search"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="contact-form bg-dark">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    <h1 class="text-white add-letter-space mb-5">İletişime geç</h1>
                    <form method="POST" action="{{route('contact.post')}}" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="firstName" class="text-black-300" >İsim</label>
                                    <input type="text" name="firstName" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Robert Lee" required>
                                    <p class="invalid-feedback">Your first-name is required!</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="lastName" class="text-black-300" >Soyisim</label>
                                    <input type="text" name="lastName" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Anderson" required>
                                    <p class="invalid-feedback">Your last-name is required!</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label class="text-black-300">E-Mail</label>
                                    <input type="email" name="email" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="kevin.jones@mail.com" required>
                                    <p class="invalid-feedback">Your email is required!</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label class="text-black-300">Mailiniz ne hakkında?</label>
                                    <select class="d-block w-100" name="topic">
                                        <option value="Kişisel">Kişisel</option>
                                        <option value="İş">İş</option>
                                        <option value="Sadece merhaba demek istiyorum:)">Sadece merhaba demek istiyorum:)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-5">
                                    <label name="message" class="text-black-300">Mesajınız</label>
                                    <textarea name="message" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Mesajınızı buraya giriniz.." required></textarea>
                                    <p class="invalid-feedback">Message is required!</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary">Gönder <img src="{{asset('front/')}}/images/arrow-right.png" alt=""></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
