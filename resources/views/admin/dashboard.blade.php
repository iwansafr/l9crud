<!DOCTYPE html>
<html lang="en">

<head>
	@include('admin.head')
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="#">
          <span class="align-middle">AdminKit</span>
        </a>
				@include('admin.sidebar')
			</div>
		</nav>

		<div class="main">
      @include('admin.navbar')

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">@yield('meta_title')</h1>
				</div>
			</main>

			<footer class="footer">
				@include('admin.footer')
			</footer>
		</div>
	</div>

	@include('admin.script')

</body>

</html>