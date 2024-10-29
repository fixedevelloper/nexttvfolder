<div>
    <div class="">
        <button wire:click="displayCard('image')" type="button" class="btn btn-primary" id="act_image">Images</button>
        <button wire:click="displayCard('audio')" type="button" class="btn btn-danger" id="act_video">Audios</button>
        <button wire:click="displayCard('video')" type="button" class="btn btn-success" id="act_video">Videos</button>
    </div>
    @if($show)
        <div class="mt-3">
            <input wire:model="image" accept="image/*"  type="file" id="actbtn" hidden>
            <label class="btn btn-dark" for="actbtn">Upload image</label>
        </div>
    <div class="row text-start mt-3"  >
        <div class="col-md-10 rv-media-main">
            <div class="rv-media-items">
                <ul class="row g-gs preview-icon-svg">
                    @foreach($images as $image)
                        <li class="col-lg-2 col-2 col-sm-2" wire:click="selected({{$image}})">
                            <div class="preview-icon-box card">
                                <div class="preview-icon-wrap">
                                    <img src="{!! asset("storage/".$image->src) !!}" width="100">
                                </div>
                                <span class="preview-icon-name">{{$image->name}}</span>
                            </div><!-- .preview-icon-box -->
                        </li><!-- .col -->
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="col-md-2">
            @if(!is_null($selectImage))
                <img src="{!! asset("storage/".$selectImage['src']) !!}" class="img-thumbnail">

                <ul>
                    <li>Name: {{$selectImage['name']}}</li>
                    <li>Created: {{\Carbon\Carbon::parse($selectImage['created_at'])->format('d M,Y')}}</li>
                    <li>Updated: {{\Carbon\Carbon::parse($selectImage['updated_at'])->format('d M,Y')}}</li>
                   {{-- <li>Url:  {!! asset("storage/".$selectImage['src']) !!}</li>--}}
                    <div class="form-control-wrap">
                        <label class="form-label" for="basic-url">URL</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{!! asset("storage/".$selectImage['src']) !!}" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">copy</span>
                            </div>
                        </div>
                    </div>
                </ul> @endif
        </div>
    </div>
    @endif
    @if($show_audio)
        <div class="mt-3">
            <input wire:model="audio" accept="audio/*" type="file" id="actbtn_audio" hidden>
            <label class="btn btn-dark" for="actbtn_audio">Upload Audio</label>
        </div>
    <div wire:loading wire:target="audio">uploading ...</div>
        <div class="row text-start mt-3"  >
            <div class="col-md-10 rv-media-main">
                <div class="rv-media-items">
                    <ul class="row g-gs preview-icon-svg">
                        @foreach($audios as $image)
                            <li class="col-lg-2 col-2 col-sm-2" wire:click="selected({{$image}})">
                                <div class="preview-icon-box card">
                                    <div class="preview-icon-wrap">
                                        <img src="{!! asset("storage/".$image->src) !!}" width="100">
                                    </div>
                                    <span class="preview-icon-name">{{$image->name}}</span>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="col-md-2">
                @if(!is_null($selectImage))
                    <img src="{!! asset("storage/".$selectImage['src']) !!}" class="img-thumbnail">

                    <ul>
                        <li>Name: {{$selectImage['name']}}</li>
                        <li>Created: {{\Carbon\Carbon::parse($selectImage['created_at'])->format('d M,Y')}}</li>
                        <li>Updated: {{\Carbon\Carbon::parse($selectImage['updated_at'])->format('d M,Y')}}</li>
                        {{-- <li>Url:  {!! asset("storage/".$selectImage['src']) !!}</li>--}}
                        <div class="form-control-wrap">
                            <label class="form-label" for="basic-url">URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{!! asset("storage/".$selectImage['src']) !!}" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">copy</span>
                                </div>
                            </div>
                        </div>
                    </ul> @endif
            </div>
        </div>
    @endif
    @if($show_video)
        <div class="mt-3">
            <input wire:model="video" accept="video/*"  type="file" id="actbtn_video" hidden>
            <label class="btn btn-dark" for="actbtn_video">Upload MP4</label>
        </div>
        <div class="row text-start mt-3"  >
            <div class="col-md-10 rv-media-main">
                <div class="rv-media-items">
                    <ul class="row g-gs preview-icon-svg">
                        @foreach($videos as $image)
                            <li class="col-lg-2 col-2 col-sm-2" wire:click="selected({{$image}})">
                                <div class="preview-icon-box card">
                                    <div class="preview-icon-wrap">
                                        <img src="{!! asset("storage/".$image->src) !!}" width="100">
                                    </div>
                                    <span class="preview-icon-name">{{$image->name}}</span>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="col-md-2">
                @if(!is_null($selectImage))
                    <img src="{!! asset("storage/".$selectImage['src']) !!}" class="img-thumbnail">

                    <ul>
                        <li>Name: {{$selectImage['name']}}</li>
                        <li>Created: {{\Carbon\Carbon::parse($selectImage['created_at'])->format('d M,Y')}}</li>
                        <li>Updated: {{\Carbon\Carbon::parse($selectImage['updated_at'])->format('d M,Y')}}</li>
                        {{-- <li>Url:  {!! asset("storage/".$selectImage['src']) !!}</li>--}}
                        <div class="form-control-wrap">
                            <label class="form-label" for="basic-url">URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{!! asset("storage/".$selectImage['src']) !!}" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">copy</span>
                                </div>
                            </div>
                        </div>
                    </ul> @endif
            </div>
        </div>
    @endif
</div>
