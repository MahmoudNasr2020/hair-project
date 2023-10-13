<!--admingroups_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ App\Models\AdminGroup::count() }}</h3>
        <p>{{ trans('admin.admingroups') }}</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ aurl('admingroups') }}" class="small-box-footer">{{ trans('admin.admingroups') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<!--admingroups_end-->
<!--admins_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ App\Models\Admin::count() }}</h3>
        <p>{{ trans('admin.admins') }}</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ aurl('admins') }}" class="small-box-footer">{{ trans('admin.admins') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<!--admins_end-->

<!--products_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Product::count()) }}</h3>
        <p>{{ trans("admin.products") }}</p>
      </div>
      <div class="icon">
        <i class="fab fa-product-hunt"></i>
      </div>
      <a href="{{ aurl("products") }}" class="small-box-footer">{{ trans("admin.products") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--products_end-->
<!--sliders_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Slider::count()) }}</h3>
        <p>{{ trans("admin.sliders") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-sliders-h"></i>
      </div>
      <a href="{{ aurl("sliders") }}" class="small-box-footer">{{ trans("admin.sliders") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--sliders_end-->
<!--blogs_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Blog::count()) }}</h3>
        <p>{{ trans("admin.blogs") }}</p>
      </div>
      <div class="icon">
        <i class="fab fa-blogger-b"></i>
      </div>
      <a href="{{ aurl("blogs") }}" class="small-box-footer">{{ trans("admin.blogs") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--blogs_end-->





<!--abouts_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\About::count()) }}</h3>
        <p>{{ trans("admin.abouts") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("abouts") }}" class="small-box-footer">{{ trans("admin.abouts") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--abouts_end-->

<!--clients_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Client::count()) }}</h3>
        <p>{{ trans("admin.clients") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("clients") }}" class="small-box-footer">{{ trans("admin.clients") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--clients_end-->
<!--statistics_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Statistic::count()) }}</h3>
        <p>{{ trans("admin.statistics") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("statistics") }}" class="small-box-footer">{{ trans("admin.statistics") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--statistics_end-->
<!--contacts_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Contact::count()) }}</h3>
        <p>{{ trans("admin.contacts") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("contacts") }}" class="small-box-footer">{{ trans("admin.contacts") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--contacts_end-->