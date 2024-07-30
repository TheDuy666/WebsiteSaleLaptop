
<link rel="stylesheet" href="{{asset('bootstrap-5.3.3/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<style>
        /* Sidebar styles */
    .sidebar {
        background-color: #f8f9fa; /* Màu nền mặc định */
    }

    /* Sidebar nav item styles */
    .sidebar .nav-item {
        transition: background-color 5s ease; /* Thêm hiệu ứng chuyển đổi */
    }

    /* Sidebar nav link styles */
    .sidebar .nav-link {
        color: #6c757d; /* Màu chữ mặc định */
        transition: color 5s ease; /* Thêm hiệu ứng chuyển đổi */
    }

    /* Sidebar nav link active styles */
    .sidebar .nav-link.active {
        color: #fff; /* Giữ màu chữ không thay đổi khi được chọn */
        background-color: lightsteelblue; /* Màu nền khi được chọn */
    }

    /* Sidebar nav item active styles */
    .sidebar .nav-item.active {
        background-color: #007bff; /* Màu nền khi được chọn */
    }
</style>
<nav id="sidebar" class="col-md-3 col-lg-1 d-md-block bg-light sidebar collapse" >
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }}" href="{{route('admin.home')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.products') ? 'active' : '' }}" href="{{route('admin.products')}}">
                    <i class="fa fa-cube"></i>
                    <span>Sản Phẩm</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.categories') ? 'active' : '' }}" href="{{route('admin.categories')}}">
                    <i class="fa fa-tags"></i>
                    <span>Thể Loại</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.brands') ? 'active' : '' }}" href="{{route('admin.brands')}}">
                    <i class="fa fa-store"></i>
                    <span>Hãng</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.users') ? 'active' : '' }}" href="{{route('admin.users')}}">
                    <i class="bi bi-person"></i>
                    <span>Khách</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.orders') ? 'active' : '' }}" href="{{route('admin.orders')}}">
                    <i class="fa fa-file-invoice"></i>
                    <span>Đơn Hàng</span>
                </a>
            </li>
        </ul>
    </aside>
</nav>
<script>
    // hiển thị xem minh dag ở trang nao
    // Lấy URL của trang hiện tại
    var currentUrl = window.location.href;

    // Lặp qua các liên kết trong menu để tìm liên kết tương ứng với trang hiện tại
    var menuLinks = document.querySelectorAll('.nav-link');
    menuLinks.forEach(function(link) {
        // So sánh URL của liên kết với URL của trang hiện tại
        if (link.href === currentUrl) {
            // Thêm một lớp CSS hoặc thay đổi kiểu để làm cho liên kết này hiển thị sáng
            link.parentElement.classList.add('active');
        }
    });
</script>
