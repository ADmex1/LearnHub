    <!-- Modal content -->
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/prismjs/themes/prism.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet" />
    @endpush

    <!-- Modal body -->
    {{-- Image Modal Drafted --}}
    {{-- 
    <form action="/my-blog" method="POST" id="post-form" enctype="multipart/form-data">
        <div id="uploadBox" class="flex items-center justify-center w-full">
            <label for="postimage"
                class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600 relative overflow-hidden">

                <!-- Default upload content -->
                <div id="upload-content" class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-semibold">Click to upload</span> or drag and drop
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG, WEBP (max 6MB)</p>
                </div>

                <!-- Image preview (hidden by default) -->
                <img id="postimage-preview" class="absolute inset-0 w-full h-full object-cover rounded-lg hidden"
                    alt="Preview" />

                <!-- Change image overlay (hidden by default) -->
                <div id="change-overlay"
                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-lg hidden hover:bg-opacity-60 transition-all duration-200">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto mb-2 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-sm text-white font-medium">Click to change image</p>
                    </div>
                </div>

            </label>
            <input id="postimage" name="postimage" type="file" class="filepond " accept="image/*" />
        </div> --}}
    <form action="/my-blog" method="POST" id="post-form" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" id="title"
                class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Title" autofocus value="{{ old('title') }}">
        </div>
        <div><label for="category"
                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Category</label><select
                name="category_id" id="category"
                class=" mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option selected=" " disabled selected>Select Category</option>
                @foreach (App\Models\category::get() as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select></div>
        <div class="sm:col-span-2 mb-4">
            <label for="content" class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">content</label>
            <textarea id="content" name="content" rows="4"
                class="hidden @error('content')
                        bg-red-50 border-red-500 text-red-900 placeholder-red-700 text-red-900 focus:ring-red-500 focus:border-red-500 
                    @enderror block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Write the content here"> {{ old('content') }}</textarea>
            <div id="editor"></div>
        </div>

        <div class="flex gap-2">
            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add new blog
            </button>
            <a href="/my-blog"
                class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                Cancel
            </a>
        </div>
    </form>
    </div>

    @push('script')
        {{-- <script>
            const input = document.getElementById('postimage');
            const preview = document.getElementById('postimage-preview');
            const uploadContent = document.getElementById('upload-content');
            const changeOverlay = document.getElementById('change-overlay');

            input.addEventListener("change", () => {
                const file = input.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        // Set preview image
                        preview.src = e.target.result;

                        // Hide the "upload" placeholder
                        uploadContent.classList.add("hidden");

                        // Show the preview + overlay
                        preview.classList.remove("hidden");
                        changeOverlay.classList.remove("hidden");
                    };
                    reader.readAsDataURL(file);
                } else {
                    // Reset to default state if no file
                    preview.src = "";
                    preview.classList.add("hidden");
                    changeOverlay.classList.add("hidden");
                    uploadContent.classList.remove("hidden");
                }
            });
        </script> --}}
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/prismjs/prism.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/prismjs/components/prism-javascript.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/prismjs/components/prism-cpp.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js">
        </script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js">
        </script>

        <script>
            // // Init FilePond
            // FilePond.registerPlugin(
            //     FilePondPluginImagePreview,
            //     FilePondPluginFileValidateSize,
            //     FilePondPluginFileValidateType
            // );

            // FilePond.create(document.querySelector('#postimage'), {
            //     acceptedFileTypes: ['image/png', 'image/jpeg', 'image/webp'],
            //     maxFileSize: '6MB',
            //     credits: false
            // });
            // Highlight.js init
            hljs.configure({
                languages: ['javascript', 'php', 'html', 'css'] // add whatever you need
            });

            const toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'],
                ['link', 'image', 'video', 'formula'],

                [{
                    'header': 1
                }, {
                    'header': 2
                }],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }, {
                    'list': 'check'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                [{
                    'direction': 'rtl'
                }],

                [{
                    'size': ['small', false, 'large', 'huge']
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],

                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'font': []
                }],
                [{
                    'align': []
                }],

                ['clean']
            ];

            const quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions,
                    syntax: true
                },
                placeholder: 'Write the content here'
            });

            const postForm = document.querySelector('#post-form');
            const postContent = document.querySelector('#content');
            const quillEditor = document.querySelector('#editor');
            document.addEventListener("DOMContentLoaded", () => {
                document.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightElement(block);
                });
            });
            postForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const content = quillEditor.children[0].innerHTML;
                postContent.value = content;
                this.submit();
            });
        </script>
    @endpush
