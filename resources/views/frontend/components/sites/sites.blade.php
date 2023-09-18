<section class="ptb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table id="sites_data_table" class="table table-striped table-bordered display no-wrap" cellspacing="0"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Website URL</th>
                            <th>Moz DA</th>
                            <th>Moz PA</th>
                            <th>Ahrefs DR</th>
                            <th>Traffic</th>
                            <th>Niche/Category</th>
                            <th>Google News</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (activeSitesOrderWise() as $site)
                            <tr>
                                <td><a href="{{ $site->website_url }}" target="_blank">{{ $site->website_name }}</a></td>
                                <td>{{ $site->da }}</td>
                                <td>{{ $site->pa }}</td>
                                <td>{{ $site->dr }}</td>
                                <td>{{ $site->traffic }}K</td>
                                @php
                                    $categories = json_decode($site->category);
                                @endphp
                                <td>
                                    @if (is_array($categories))
                                        @foreach ($categories as $categoryObj)
                                            {{ $categoryObj->value }}
                                        @endforeach
                                    @endif
                                </td>
                                <td> {{ $site->google_news == 1 ? 'YES' : 'NO' }}</td>
                                <td><a href="/contact">Contact</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
