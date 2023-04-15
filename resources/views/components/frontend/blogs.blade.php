<div class="hero">
    <div class="container d-flex justify-content-center flex-column">
        <div class="d-flex justify-content-center align-items-center ">
            <h3 class="section-title mb-4">Travel Blogs</h3>
        </div>
        <div class="cards d-flex justify-content-center flex-row flex-wrap">
            @foreach($articles as $article)
                <div class="card ms-3 mt-4" style="max-width: 250px;">
                    <div class="card-header rounded-top p-0">
                        <img class="rounded-top" style="width: 100%" src="{{$article['urlToImage']}}" alt="">
                    </div>
                    <div class="card-body justify-content-between d-flex flex-column justify-content-between" style="min-height: 250px">
                        <label class="fw-bold">
                            {!!$article['title']!!}
                        </label>
                        <label class="mt-3">
                            {!!\Illuminate\Support\Str::limit($article['description'], 60, '...')!!}
                        </label>
                        <a href="{{$article['url']}}" class="text-decoration-none mt-4">
                            <button class="main_btn d-flex mx-auto justify-content-center align-items-center ">
                                <label class="me-3 fs-6 fw-light">
                                    Read More
                                </label>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-12 my-3 d-flex justify-content-end">
                <a href="{{url('/blogs')}}" class="text-decoration-none">
                    <button class="main_btn d-flex justify-content-center fs-2">
                        <label class="me-3 fs-5 fw-light">
                            More Blogs
                        </label>
                        <div class="fs-6">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
