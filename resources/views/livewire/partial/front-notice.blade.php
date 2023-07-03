<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        a {
            color: #fff;
            text-decoration: none
        }

        .ticker {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            height: 50px;
            margin: 0 auto
        }

        .news {
            width: 100%;
            padding: 0 2%
        }

        .news marquee {
            font-size: 18px;
            margin-top: 12px
        }

        .news-content p {
            margin-right: 41px;
            display: inline
        }
    </style>

    <div class="container">
        <div class="ticker">
            <div class="news">
                <marquee class="news-content" onmouseover="this.stop();" onmouseout="this.start();">
                    @foreach ($notices as $notice)
                        <a href="{{ route('notice.detail', ['notice_slug' => $notice->slug]) }}">
                            <p>{{ $notice->title }}</p>
                        </a>
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</div>
