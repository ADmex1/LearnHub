<x-EmptyLayout>
    @push('style')
        <style>
            body,
            html {
                height: 100%;
                margin: 0;
            }

            .coming-soon-bg {
                background-image: url('https://images.pexels.com/photos/270404/pexels-photo-270404.jpeg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .overlay {
                background: rgba(0, 0, 0, 0.6);
            }

            .centered {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                text-align: center;
                padding: 1rem;
            }

            .centered h2 {
                font-size: 2.5rem;
                font-weight: bold;
                color: #f5f5f5;
                margin-bottom: 0.5rem;
                animation: pulse 2s infinite;
            }

            .centered p {
                color: #cccccc;
                font-size: 1.125rem;
            }

            @keyframes pulse {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0.7;
                }
            }
        </style>
    @endpush

    <div class="coming-soon-bg" style="height: 100vh;">
        <div class="overlay" style="height: 100%; width: 100%;">
            <div class="centered">
                <div>
                    <h2> Project Showcase Coming Soon </h2>
                    <p>Currently Busy with College.</p>
                </div>
            </div>
        </div>
    </div>
</x-EmptyLayout>
