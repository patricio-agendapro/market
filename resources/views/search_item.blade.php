          @foreach ($items as $item)

          
            <div class="card">
              <div class="card-body p-0">
                <div class="row mx-0 flex-column flex-md-row">
                  <div class="col-sm-12 col-md-7 col-lg-7 p-2 presentation">
                    <div class="head">
                      <div class="row">
                        <div class="company_logo"><a href="{{ $item['web_address'] }}"><img width="112" height="auto" class="lazy" data-src="{{ $item['logo'] }}" src="" alt="nombre compañia"></a></div>
                        <div class="company_title">
                          <span class="name"><a href="{{ $item['web_address'] }}">{{ $item['name'] }}</a></span></span>
                          <span class="category">{{ $item['economic_sectors'] }}</span>
                          <span class="subcategory">{{ $item['categories'] }}</span>
                        </div><!--company title-->
                        <div class="services">
                          <div class="title">Algunos Servicios</div>
                          <span class="service-description"><h2>{{ $item['services'][0]['service'] }}</h2>{{ $item['services'][0]['description'] }}</span>
                          <div class="other-services">
                          @foreach ($item['h3'] as $h3)
                            <h3>{{ $h3['service'] }}</h3>
                          @endforeach
                          </div>
                        </div><!--services-->
                      </div>  
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-5 col-lg-5 p-2 booking">
                    <div class="locations">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($item['locations_out'] as $location)
                        <li class="nav-item" role="presentation">
                          <button class="nav-link @if ($loop->index == 0) active @endif" id="address{{ $location['location_id'] }}-tab" data-bs-toggle="tab" data-bs-target="#address{{ $location['location_id'] }}" type="button" role="tab" aria-controls="address{{ $location['location_id'] }}" aria-selected="true">Dirección {{ $loop->index+1 }}</button>
                        </li>
                        @endforeach

                        @if (count($item['locations_id']) > 2)
                        <li class="nav-item ms-auto" role="presentation">
                          <a href="{{ $item['web_address'] }}"><button class="nav-link" id="more-tab" type="button" role="tab" aria-selected="true">Ver todas</button></a>
                        </li>
                        @endif
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        @foreach ($item['locations_out'] as $location)
                        <div class="tab-pane fade @if ($loop->index == 0) show active @endif" id="address{{ $location['location_id'] }}" role="tabpanel" aria-labelledby="address{{ $location['location_id'] }}">
                          <span class="address"><i class="svg-icon"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 18 18">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                          </svg></i> {{ $location['address'] }}<span> - </span><a target="_blank" href="https://www.google.com/maps/search/?api=1&query={{ $location['latlng'][0] }},{{ $location['latlng'][1] }}">Mapa</a></span>
                          <div class="location_box">
                            <div class="schedule">
                            <p class="title"><i class="svg-icon"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-calendar2-week-fill" viewBox="0 0 18 18">
                              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM8.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM3 10.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                            </svg></i> Horario</p>
                              @isset($location['location_times'][1])<span><strong>Lun:</strong> {{ $location['location_times'][1] }}</span>@endisset
                              @isset($location['location_times'][2])<span><strong>Mar:</strong> {{ $location['location_times'][2] }}</span>@endisset
                              @isset($location['location_times'][3])<span><strong>Mier:</strong> {{ $location['location_times'][3] }}</span>@endisset
                              @isset($location['location_times'][4])<span><strong>Jue:</strong> {{ $location['location_times'][4] }}</span>@endisset
                              @isset($location['location_times'][5])<span><strong>Vie:</strong> {{ $location['location_times'][5] }}</span>@endisset
                              @isset($location['location_times'][6])<span><strong>Sab:</strong> {{ $location['location_times'][6] }}</span>@endisset
                              @isset($location['location_times'][7])<span><strong>Dom:</strong> {{ $location['location_times'][7] }}</span>@endisset
                            </div>
                            <div class="location_map" style="display: none;">
                              <img data-src="{{ $location['image_map'] }}" class="lazy">
                            </div>
                          </div>
                          <a href="{{ $item['web_address'] }}/workflow?local={{ $location['location_id'] }}"><span class="booking_button"><button type="button" class="btn btn-primary">Ver Agenda @if (count($item['locations_out']) > 1) de esta Sucursal @endif</button></span></a>
                        </div>
                        @endforeach
                      </div>
                    </div><!--locations>-->
                  </div>
                </div>
              </div>
            </div><!---card-->

            @endforeach