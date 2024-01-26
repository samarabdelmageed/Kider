@extends('layouts.app')

@section('content')

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Kider</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{request()->routeIs(['testimonials','insertTestimonial','trashedTestimonials']) ?'active':''}}" data-bs-toggle="dropdown">Testimonials</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="{{ route('testimonials') }}" class="dropdown-item {{ request()->routeIs('testimonials') ? 'active' : '' }}">Testimonials List</a>
                            <a href="{{ route('insertTestimonial') }}" class="dropdown-item {{ request()->routeIs('insertTestimonial') ? 'active' : '' }}">Insert Testimonial</a>
                            <a href="{{ route('trashedTestimonials') }}" class="dropdown-item {{ request()->routeIs('trashedTestimonials') ? 'active' : '' }}">Trashed Testimonials</a>
                            <!-- <a href="404.html" class="dropdown-item">404 Error</a> -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{request()->routeIs(['teachers','insertTeacher','trashedTeachers']) ?'active':''}}" data-bs-toggle="dropdown">Teachers</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="{{ route('teachers') }}" class="dropdown-item {{ request()->routeIs('teachers') ? 'active' : '' }}">Teachers List</a>
                            <a href="{{ route('insertTeacher') }}" class="dropdown-item {{ request()->routeIs('insertTeacher') ? 'active' : '' }}">Insert Teacher</a>
                            <a href="{{ route('trashedTeachers') }}" class="dropdown-item {{ request()->routeIs('trashedTeachers') ? 'active' : '' }}">Trashed Teachers</a>
                            <!-- <a href="404.html" class="dropdown-item">404 Error</a> -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{request()->routeIs(['classesList','insertClass','trashedClasses']) ?'active':''}}" data-bs-toggle="dropdown">Classes</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="{{ route('classesList') }}" class="dropdown-item {{ request()->routeIs('classesList') ? 'active' : '' }}">Classes List</a>
                            <a href="{{ route('insertClass') }}" class="dropdown-item {{ request()->routeIs('insertClass') ? 'active' : '' }}">Insert Class</a>
                            <a href="{{ route('trashedClasses') }}" class="dropdown-item {{ request()->routeIs('trashedClasses') ? 'active' : '' }}">Trashed Classes</a>
                            <!-- <a href="404.html" class="dropdown-item">404 Error</a> -->
                        </div>
                    </div>
                    <a href="{{ route('appointments') }}" class="nav-item nav-link {{ request()->routeIs('appointments') ? 'active' : '' }}">Appointments List</a>           
                    <a href="{{ route('contacts') }}" class="nav-item nav-link {{ request()->routeIs('contacts') ? 'active' : '' }}">Contacts List</a>
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('Home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('unreadContacts') }}" class="nav-item nav-link">{{$unreadCount}} Unread Contact Messages</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
@endsection
