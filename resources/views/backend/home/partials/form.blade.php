<div class="form-group">
    <div class="fg-line">
        <input type="text" class="form-control" name="title" id="title"  placeholder="Title">
    </div>
</div>

<div class="form-group hidden">
    <div class="fg-line">
        <input type="text" class="form-control" name="slug" id="slug" placeholder="Post Slug">
    </div>
</div>

<div class="form-group">
    <div class="fg-line">
        <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitle">
    </div>
</div>

<div class="form-group">
    <div class="fg-line">
        <textarea class="form-control auto-size" id="editor" name="content" placeholder="What's on your mind?"></textarea>
    </div>
</div>

<div class="form-group hidden">
    <div class="fg-line">
        <input class="form-control datetime-picker" name="published_at" id="published_at" type="text" value="{{ date('Y-m-d G:i:s') }}">
    </div>
</div>

<div class="checkbox m-b-15 hidden">
    <label>
        <input type="checkbox" name="is_draft" checked>
        <i class="input-helper"></i>
        Draft?
    </label>
</div>

<div class="form-group hidden">
    <div class="fg-line">
        <input type="text" class="form-control" name="layout" id="layout" value="frontend.blog.post" placeholder="Layout">
    </div>
</div>
