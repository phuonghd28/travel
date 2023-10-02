@extends('clients.master')
@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100"
                             src="https://vnn-imgs-f.vgcloud.vn/2021/09/08/09/201045661-5093385857347540-925144400932910523-n.jpg"
                             alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Chào mừng bạn tới <span class="text-primary">Hải Phòng</span></h1>
                    <p class="mb-4">Hải Phòng là nơi có lịch sử vinh quang ngàn năm, một vùng đất hội tụ đầy đủ khí
                        thiêng sông núi, và một cư­ dân anh dũng, sáng tạo và rất cởi mở, dễ hoà hợp với bè bạn bốn
                        phư­ơng. Những ng­­ười dân từ nhiều miền quê đến sinh sống tại vùng đất cửa biển này đã hình
                        thành nên tính cách kiên nghị, năng động, sáng tạo trong lao động, luôn nhạy bén với cái mới,
                        làm cho ng­­ười Hải Phòng sớm tiếp thu đ­­ược những tinh hoa của thời đại trư­­ớc biến thiên của
                        lịch sử. Tất cả những yếu tố trên đã và sẽ làm cho Hải Phòng trở thành một địa danh du lịch nổi
                        tiếng trong n­ước và quốc tế..</p>
                    <p class="mb-4"></p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Đường ven biển đẹp nhất
                                Vịnh Bắc Bộ</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Nhiều bãi tắm biển đẹp
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Nhiều địa điểm foodtour
                                giá rẻ</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Có nhiều dịch vụ đi lại
                                thuận tiện</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Chúng tôi</h6>
                <h1 class="mb-5">Chúng tôi</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5>Có các địa điểm du lịch nổi tiếng</h5>
                            <p>Cát Bà được Unesco công nhận là kì quan thiên nhiên thế giới với nhiều Vịnh đẹp thuộc top
                                thế giới</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                            <h5>Nhiều khách sạn & Homestay giá rẻ</h5>
                            <p>Ở Hải Phòng có rất nhiều nơi cho thuê khách sạn và homestay giá cực tốt gần các địa điểm
                                du lịch</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user text-primary mb-4"></i>
                            <h5>Con người</h5>
                            <p>Người dân Hải Phòng rất thân thiện luôn vui vẻ đón chào khách du lịch ở khắp nơi từ trong
                                nước tới quốc tế</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Destination Start -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Chi tiết</h6>
                <h1 class="mb-5">Danh mục</h1>
            </div>
            <div class="row g-3">
                @foreach($type as $item)
                <div class="col-lg-6 col-md-6 zoomIn wow" data-wow-delay="0.1s">
                    <a class="position-relative d-block overflow-hidden" href="/articles?type={{$item->id}}">
                        <img class="img-fluid"
                                src="{{$item->image}}"
                                alt="" style="height: 400px;width: 100%;object-fit: cover">
                        <div
                            class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                            {{$item->name}}
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Destination Start -->


    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Các bài viết</h6>
                <h1 class="mb-5">Các bài viết tiêu biểu</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($articles as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="package-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{$item->images}}" alt="" style="height: 300px; object-fit: cover">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{$item->type_id}}</small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-calendar-alt text-primary me-2"></i>{{date_format($item->created_at, 'd M Y')}}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$item->author}}</small>
                            </div>
                            <div class="text-center p-4">
                                <p>{{$item->title}}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="{{route('detail', $item->id)}}" class="btn btn-sm btn-primary px-3" style="border-radius: 30px;">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Package End -->



    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Clients Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="/assets/img/testimonial-1.jpg"
                         style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="/assets/img/testimonial-2.jpg"
                         style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="/assets/img/testimonial-3.jpg"
                         style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="/assets/img/testimonial-4.jpg"
                         style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
