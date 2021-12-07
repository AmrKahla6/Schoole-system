@extends('layouts.master')
@section('css')

@section('title')
    @lang('classrooms.title_page')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    @lang('main-side.schoolGrade')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
            @include('partials._errors')
            @include('partials._session')
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('classrooms.add_class') }}
            </button>
            <br><br>
          <div class="table-responsive">
            <table id="datatable" class="table p-0 table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('classrooms.className')</th>
                        <th>@lang('classrooms.Name_Grade')</th>
                        <th>@lang('classrooms.Processes')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $index => $item)
                        <tr>
                            <td>{{$index +1 }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->grade->name}}</td>
                            <td>
                                <button type="button" class="modal-effect btn btn-info btn-sm"
                                    data-effect="effect-scale" data-id="{{ $item->id }}" data-name_ar="{{ $item->getTranslation('name', 'ar') }}"
                                    data-name_en="{{ $item->getTranslation('name', 'en') }}" data-grade="{{ $item->grade_id }}"
                                    data-toggle="modal" href="#modaldemo2" title="{{ trans('classrooms.Edit') }}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="modal-effect btn btn-danger btn-sm"
                                    data-effect="effect-scale" data-id="{{ $item->id }}"
                                    data-toggle="modal" href="#modaldemo15" title="{{ trans('classrooms.Delete') }}"><i
                                        class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>@lang('classrooms.className')</th>
                        <th>@lang('classrooms.Name_Grade')</th>
                        <th>@lang('classrooms.Processes')</th>
                    </tr>
                </tfoot>

             </table>

        </div>
        </div>
      </div>
    </div>
  </div>
  @include('dashboard.classrooms.create')
  @include('dashboard.classrooms.edit')
  @include('dashboard.classrooms.delete')
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    //Edit Grades
    $('#modaldemo2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name_ar  = button.data('name_ar')
        var name_en  = button.data('name_en')
        var grade_id = button.data('grade')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #class_name_ar').val(name_ar);
        modal.find('.modal-body #class_name_en').val(name_en);
        modal.find('.modal-body #grade_id').val(grade_id);
    })
</script>

<script>
    //Delete Grades
    $('#modaldemo15').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })
</script>
@endsection
