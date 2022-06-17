<!-- Start Partner Area -->
<div class="partner-area ptb-80 bg">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h3>Our Clients</h3>
            </div>
            <div class="partner-slider">
                @foreach ($clients as $client)
                <div class="col-lg-12 col-md-12">
                    <div class="item">
                        <a href="#">
                            <img src="{{ URL::asset('uploads/clients/'.$client->client_logo) }}" alt="Our Clients">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Partner Area -->