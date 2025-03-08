@extends('front.layouts.master')
@section('title')
    الرئيسية
@endsection

@section('content')
    <!-- Content -->
    <div id="content">
        @if (Session::has('Success_message'))
            @php
                toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
            @endphp
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                    toastify()->error($error);
                @endphp
            @endforeach
        @endif
        <!-- Page Title -->
        <div class="hero_section page-title" style="background-image: url('{{ asset('assets/front/uploads/slogan2.png') }}')">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row no-gutters">



                    <div id="categories-menu" class="categories-container">
                        <ul class="list-unstyled all_categories">
                            @foreach ($categories as $category)
                                <li><a href="#{{ $category['slug'] }}">{{ $category['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="col-md-12">
                        @foreach ($categories as $category)
                            <!-- Category Details -->
                            <div id="{{ $category['slug'] }}" class="menu-category">
                                <div class="menu-category-content padded">
                                    <div class="row gutters-sm">
                                        @foreach ($category['products'] as $product)
                                            <div class="col-lg-3 col-12">
                                                <!-- Menu Item -->
                                                <div class="menu-item menu-grid-item">
                                                        <img loading="lazy" style="width: 100%" class="mb-4"
                                                        src="{{ asset('assets/uploads/product_images/' . $product['image']) }}"
                                                        alt="{{ $product['name'] }}" />
                                                    <h6 class="mb-0">{{ $product['name'] }}</h6>
                                                    <div class="row align-items-center mt-4">
                                                        <div class="col-6">
                                                            <span class="text-md mr-4">
                                                                <span class="text-muted"></span> <span
                                                                    data-product-base-price class="product-price">
                                                                    {{ number_format($product['price'], 2) }} </span> <img
                                                                    loading="lazy" width="20px"
                                                                    src="{{ asset('assets/uploads/riyal.svg') }}"
                                                                    alt="">

                                                            </span>
                                                        </div>
                                                        <div class="col-6 text-sm-right mt-2 mt-sm-0">
                                                            <button class="btn btn-secondary btn-sm add_to_cart"
                                                                data-action="open-cart-modal" data-bs-toggle="modal"
                                                                data-bs-target="#product-modal_{{ $product['id'] }}"
                                                                data-id="1">
                                                                <span> تفاصيل المنتج </span>
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!----------------------- Product Model -------------->
                                            <!-- Modal / Product -->
                                            <div class="modal fade product-modal" id="product-modal_{{ $product['id'] }}"
                                                tabindex="-1" role="dialog" aria-hidden="true"
                                                aria-labelledby="exampleModalLabel" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex justify-content-between">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                {{ $product['name'] }}
                                                            </h1>
                                                            <button style="margin:0;" type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-product-details">
                                                            <div class="product-image" loading="lazy"
                                                                style="background-image: url('{{ asset('assets/uploads/product_images/' . $product['image']) }}')">
                                                            </div>
                                                            <div class="row align-items-center" style="padding:15px;">
                                                                <div class="col-12">
                                                                    <h6 class="mb-1 product-modal-name">
                                                                        {{ $product['name'] }}</h6>
                                                                    <span
                                                                        class="product-modal-ingredients">{{ $product['description'] }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="quantity_section">
                                                            <div>
                                                                <div class="quantity">
                                                                    <div class="quantity-control d-flex align-items-center">
                                                                        <!-- زر تقليل العدد -->
                                                                        <button class="decrease-quantity btn"
                                                                            data-product-id="{{ $product['id'] }}"
                                                                            data-product-price="{{ $product['price'] }}">
                                                                            -
                                                                        </button>
                                                                        <!-- إدخال العدد -->
                                                                        <input id="quantity-{{ $product['id'] }}"
                                                                            type="number" value="1" name="quantity"
                                                                            class="mx-2 text-center" style="width: 60px;"
                                                                            min="1"
                                                                            data-product-id="{{ $product['id'] }}"
                                                                            data-product-price="{{ $product['price'] }}">
                                                                        <!-- زر زيادة العدد -->
                                                                        <button class="increase-quantity btn"
                                                                            data-product-id="{{ $product['id'] }}"
                                                                            data-product-price="{{ $product['price'] }}">
                                                                            +
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price_section">
                                                                <span id="total-price-{{ $product['id'] }}"
                                                                    class="product-modal-price">{{ number_format($product['price'], 2) }}
                                                                </span>
                                                                <img loading="lazy" src="{{ asset('assets/uploads/riyal.svg') }}"
                                                                    style="width: 20px;" alt="riyal">
                                                            </div>

                                                        </div>
                                                        <form id="addToCart_{{ $product['id'] }}" class=""
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product['id'] }}">
                                                            <input type="hidden" id="hidden-quantity-{{ $product['id'] }}"
                                                                name="number" value="1">
                                                            <input type="hidden" name="price"
                                                                value="{{ $product['price'] }}">
                                                            <div class="row align-items-center">
                                                                <button type="button"
                                                                    id="addtocartbutton_{{ $product['id'] }}"
                                                                    class="btn btn-secondary btn-block btn-lg">
                                                                    اضف الي السلة
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                        <script>
                                                            $(document).ready(function() {
                                                                $("#addtocartbutton_{{ $product['id'] }}").on('click', function(e) {
                                                                    e.preventDefault();
                                                                    console.log('clicked');

                                                                    $.ajax({
                                                                        url: '{{ route('cart.add') }}',
                                                                        method: 'POST',
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                        },
                                                                        data: $("#addToCart_{{ $product['id'] }}").serialize(),
                                                                        success: function(response) {
                                                                            // تحقق من وجود الحقول المطلوبة في response
                                                                            if (response.message) {
                                                                                Toastify({
                                                                                    text: response.message,
                                                                                    duration: 3000,
                                                                                    gravity: "top",
                                                                                    position: "right",
                                                                                    backgroundColor: "#4CAF50",
                                                                                }).showToast();
                                                                            }
                                                                            // تحديث عداد المنتجات في السلة
                                                                            if (response.cartCount) {
                                                                                $('.cart-icon .notification1').text(response.cartCount);
                                                                            }

                                                                            if (response.cartCount) {
                                                                                updateCartCount(response.cartCount); // تحديث العداد
                                                                            }
                                                                            updateCartModal();
                                                                           // $('#offcanvascart').addClass('show');
                                                                            $('.product-modal').hide();
                                                                            // إزالة overlay الخاص بالمودال
                                                                            $('.modal-backdrop').remove();
                                                                            $('body').css('overflow', 'auto');
                                                                        },
                                                                        error: function(xhr, status, error) {
                                                                            Toastify({
                                                                                text: "حدث خطأ أثناء إضافة المنتج للسلة",
                                                                                duration: 3000,
                                                                                gravity: "top",
                                                                                position: "right",
                                                                                backgroundColor: "#FF5733",
                                                                            }).showToast();
                                                                        }
                                                                    });
                                                                });

                                                                function updateCartCount(cartCount) {
                                                                    $('.cart-icon .notification').text(cartCount);
                                                                }

                                                                function updateCartModal() {
                                                                    $.ajax({
                                                                        url: '/cart/items',
                                                                        method: 'GET',
                                                                        success: function(response) {
                                                                            if (response.html) {
                                                                                $('#panel-cart .cart-details').html(response.html);
                                                                            }

                                                                            if (response.cartCount) {
                                                                                updateCartCount(response.cartCount);
                                                                            }
                                                                        },
                                                                        error: function(xhr, status, error) {
                                                                            console.error('خطأ في تحديث السلة:', error);
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                        </script>


                                                    </div>
                                                </div>
                                            </div>
                                            <!--------------------- End Product Model ---------------->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->

    </div>
@endsection
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // زيادة العدد
            document.querySelectorAll(".increase-quantity").forEach(button => {
                button.addEventListener("click", function() {
                    const productId = this.dataset.productId;
                    const productPrice = parseFloat(this.dataset.productPrice);
                    const quantityInput = document.getElementById(`quantity-${productId}`);
                    const hiddenQuantityInput = document.getElementById(
                        `hidden-quantity-${productId}`);
                    const totalPriceElement = document.getElementById(`total-price-${productId}`);

                    // زيادة العدد
                    let quantity = parseInt(quantityInput.value);
                    quantity++;
                    quantityInput.value = quantity;
                    hiddenQuantityInput.value = quantity; // تحديث الحقل المخفي

                    // تحديث المجموع
                    const totalPrice = (quantity * productPrice).toFixed(2);
                    totalPriceElement.textContent = totalPrice;
                });
            });

            // تقليل العدد
            document.querySelectorAll(".decrease-quantity").forEach(button => {
                button.addEventListener("click", function() {
                    const productId = this.dataset.productId;
                    const productPrice = parseFloat(this.dataset.productPrice);
                    const quantityInput = document.getElementById(`quantity-${productId}`);
                    const hiddenQuantityInput = document.getElementById(
                        `hidden-quantity-${productId}`);
                    const totalPriceElement = document.getElementById(`total-price-${productId}`);

                    // تقليل العدد (إذا كان أكبر من 1)
                    let quantity = parseInt(quantityInput.value);
                    if (quantity > 1) {
                        quantity--;
                        quantityInput.value = quantity;
                        hiddenQuantityInput.value = quantity; // تحديث الحقل المخفي

                        // تحديث المجموع
                        const totalPrice = (quantity * productPrice).toFixed(2);
                        totalPriceElement.textContent = totalPrice;
                    }
                });
            });

            // تحديث الحقل المخفي عند إدخال الكمية يدويًا
            document.querySelectorAll("input[type='number']").forEach(input => {
                input.addEventListener("input", function() {
                    const productId = this.dataset.productId;
                    const productPrice = parseFloat(this.dataset.productPrice);
                    const quantity = parseInt(this.value);
                    const hiddenQuantityInput = document.getElementById(
                        `hidden-quantity-${productId}`);
                    const totalPriceElement = document.getElementById(`total-price-${productId}`);

                    if (quantity >= 1) {
                        hiddenQuantityInput.value = quantity; // تحديث الحقل المخفي

                        // تحديث المجموع
                        const totalPrice = (quantity * productPrice).toFixed(2);
                        totalPriceElement.textContent = totalPrice;
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const categoriesMenu = document.getElementById("categories-menu");
            const categoryLinks = document.querySelectorAll(".all_categories li a");
            const sections = document.querySelectorAll(".menu-category");

            const menuOffset = categoriesMenu.offsetTop;

            function handleScroll() {
                if (window.scrollY >= menuOffset) {
                    categoriesMenu.classList.add("fixed-menu");
                } else {
                    categoriesMenu.classList.remove("fixed-menu");
                }

                let currentSection = "";
                sections.forEach((section) => {
                    const sectionTop = section.offsetTop - 150; // تعديل ليعمل مع القائمة الثابتة
                    if (window.scrollY >= sectionTop) {
                        currentSection = section.getAttribute("id");
                    }
                });

                categoryLinks.forEach((link) => {
                    link.classList.remove("active");
                    if (link.getAttribute("href").slice(1) === currentSection) {
                        link.classList.add("active");
                    }
                });
            }

            window.addEventListener("scroll", handleScroll);

            // تنقل سلس عند الضغط على أي عنصر من القائمة
            categoryLinks.forEach((link) => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute("href").slice(1);
                    document.getElementById(targetId).scrollIntoView({
                        behavior: "smooth",
                        block: "start"
                    });
                });
            });
        });
    </script>
    <script></script>
@endsection
