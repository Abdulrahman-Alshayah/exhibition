<!-- Modal -->
<div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    حذف المنتج</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category.destroy') }}" method="post">
                {{ method_field('post') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5>هل أنت متأكد من حذف الفئة  {{$category->name}}</h5>
                    <input type="hidden" value="1" name="page_id">

                    <input type="hidden" name="id" value="{{ $category->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/sections_trans.Close')}}</button>
                    <button type="submit" class="btn btn-danger">{{trans('Dashboard/sections_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
