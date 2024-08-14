<div class="container-fluid my-3 p-4">
    <div class="row flex-column flex-lg-row">
      <h2 class="text-center">Total Lists</h2>
        <div class="col">
          <div class="card mb-3">
            <div class="card-body">
              <h3 class="card-title h2">{{$blogs}}</h3>
                <span class="text-primary fw-bold">
                  Total Blogs
                </span>
            </div>
            <div class="card-footer">
              <a href="{{url('/admin/blogs/show')}}" class="small text-secondary">
                View Details
              </a>
            </div>
          </div>
        </div>
      <div class="col">
        <div class="card mb-3">
          <div class="card-body">
            <h3 class="card-title h2">{{$user}}</h3>
              <span class="text-info fw-bold">
                Register Users
              </span>
          </div>
          <div class="card-footer">
            <a href="{{url('/admin/dashboard')}}" class="small text-secondary">
              View Details
            </a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-3">
          <div class="card-body">
            <h3 class="card-title h2">{{$faq}}</h3>
              <span class="text-success fw-bold">
                Total Questions and Answers
              </span>
          </div>
          <div class="card-footer">
            <a href="{{url('/admin/faq')}}" class="small text-secondary">
              View Details
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>        
