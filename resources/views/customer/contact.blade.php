@extends('layout.customerApp')
@section('content')
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('customer.home')}}">Trang chủ </a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"> Liên hệ </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->


        <div class="container">
            <div class="mb-5">
                <h1 class="text-center">Liên hệ </h1>
            </div>
            <div class="row mb-10">
                <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
                    <div class="mr-xl-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Giới thiệu chung</h3>
                        </div>
                        <p class="max-width-830-xl text-gray-90">Công ty Cổ phần Đầu tư Công nghệ Electro (viết tắt là “ELEC”, tiền thân là Công ty Cổ phần Máy tính Hà Nội, sở hữu thương hiệu Electronics), được thành lập vào tháng 9/2001, hoạt động chủ yếu trong lĩnh vực bán lẻ các sản phẩm máy tính và thiết bị văn phòng. Trải qua chặng đường hơn 20 năm phát triển, đến nay HACOM đã trở thành một trong những thương hiệu hàng đầu trong lĩnh vực kinh doanh các sản phẩm Công nghệ thông tin tại Việt Nam với hệ thống các showroom quy mô và hiện đại trải dài từ Bắc vào Nam.
                            <br>

                            Nhiều tổ chức uy tín liên tục đánh giá cao Electronics với nhiều giải thưởng danh giá: Top 50 Nhãn hiệu nổi tiếng Việt Nam do Hội Sở hữu Trí tuệ Việt Nam công nhận và trao tặng; Top 500 Doanh nghiệp tăng trưởng nhanh nhất Việt Nam 2021 và 2022 (FAST500), top 500 Doanh nghiệp lớn nhất Việt Nam 2021 (VNR500) do Vietnam Report công nhận và trao tặng, top 50 Thương hiệu Uy tín Hàng đầu Châu Á 2022 do Trung tâm Nghiên cứu Phát triển Doanh nghiệp Châu Á phối hợp với tổ chức Giám sát Chất lượng Quốc tế xét chọn.
                            <br>

                            Với khẩu hiệu “Uy tín tạo dựng niềm tin”, Elec mong muốn xây dựng “niềm tin” của Khách hàng bằng chất lượng dịch vụ tốt nhất, vượt trội nhất. Đó cũng chính là kim chỉ nam cho sự phát triển bền vững mà Elec hướng đến.
                        </p>

                    </div>
                </div>
                <div class="col-lg-5 col-xl-6">
                    <div class="mb-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4359.777309882497!2d105.8394870650274!3d21.019393533498516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab8fd1148fd5%3A0x6cc241e68a39e297!2zNyBQLiBUaGnhu4FuIFF1YW5nLCBOZ3V54buFbiBEdSwgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1718448011245!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                    </div>
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Địa chỉ của chúng tôi</h3>
                    </div>
                    <address class="mb-6 text-lh-23">
                        7 P. Thiền Quang, Nguyễn Du, Hai Bà Trưng, Hà Nội, Việt Nam

                        <div class=""> Hỗ trợ (+84)856 800 604</div>
                        <div class="">Email: <a class="text-blue text-decoration-on" >info@electro.com</a></div>
                        <div class="">Facebook: <a class="text-blue text-decoration-on" href="">https://www.facebook.com/electronisstore.87</a></div>
                    </address>
                    <h5 class="font-size-14 font-weight-bold mb-3">Giờ mở cửa </h5>
                    <div class=""> Thứ Hai - Thứ 6: 9:00 - 22:00 </div>
                    <div class="mb-6">Thứ Bảy - Chủ Nhật: 8:30 - 11:00 </div>
                </div>
            </div>
            <!-- Brand Carousel -->

            <!-- End Brand Carousel -->
        </div>
    </main>
@endsection
