@extends('app')

{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::hr.employee', 2) }} :: @parent
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/chosen_v1.0.0/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/chosen_v1.0.0/chosen_bootstrap.css') }}">
@stop

@section('scripts')
	<script type="text/javascript" src="{{ asset('assets/vendors/chosen_v1.0.0/chosen.jquery.min.js') }}"></script>
@stop

@section('inline-scripts')
	jQuery(document).ready(function($) {
		$(".chosen-select").chosen();
	});
@stop


{{-- Content --}}
@section('content')

<div id="wrap" class="container">

<div class="row">
<h1>
	<p class="pull-right">
	<a href="/employees" class="btn btn-default" title="{{ trans('kotoba::button.back') }}">
		<i class="fa fa-chevron-left fa-fw"></i>
		{{ trans('kotoba::button.back') }}
	</a>
	</p>
	<i class="fa fa-edit fa-lg"></i>
	{{-- trans('kotoba::general.command.edit') --}}
	{{{ $employee->profile->prefix }}}&nbsp;{{{ $employee->profile->first_name }}}&nbsp;{{{ $employee->profile->middle_initial }}}&nbsp;{{{ $employee->profile->last_name }}}&nbsp;{{{ $employee->profile->suffix }}}
	<hr>
</h1>
</div>


<div class="row">
{!! Form::model(
	$employee,
	[
		'route' => ['employees.update', $employee->id],
		'method' => 'PATCH',
		'class' => 'form'
	]
) !!}
{!! Form::hidden('user_id', $employee->user_id) !!}


<div class="form-group padding-bottom-xl">
	<label for="inputEmployeeType" class="col-sm-2 control-label">{{ Lang::choice('kotoba::hr.employee_type', 1) }}:</label>
	<div class="col-sm-10">
		{!!
			Form::select(
				'employee_type_id',
				$employeeTypes,
				$employee->employee_type_id,
				array(
					'class' => 'form-control chosen-select'
				)
			)
		!!}
	</div>
</div>

<div class="form-group padding-bottom-xl">
	<label for="inputDepartment" class="col-sm-2 control-label">{{ Lang::choice('kotoba::hr.department',2 ) }}:</label>
	<div class="col-sm-10">
		<select multiple="multiple" id="departments" name="departments[]" class="form-control chosen-select">
		@foreach ($departments as $key => $value)
			<option value='{!! $key !!}' {{ $employee->present()->selectedDepartments($key) }}>{{ $value  }}</option>
		@endforeach
		</select>
<!--
		@foreach (App\Modules\Gakko\Http\Domain\Models\Department::All() as $department)
			<label class="checkbox-inline">
				<input type="checkbox" name="departments[]" value="{{ $department->id }}" {{ $employee->present()->checkBoxDepartments($department->id) }}>
				{{ $department->name }}
			</label>
		@endforeach
-->
	</div>
</div>

<div class="form-group padding-bottom-xl">
	<label for="inputJobTitle1" class="col-sm-2 control-label">{{ Lang::choice('kotoba::hr.job_title', 1) }}:</label>
	<div class="col-sm-10">
<!--
		{!!
			Form::select(
				'jobtitles[]',
				$jobTitles,
				$employee->job_title_id,
				array(
					'class' => 'form-control chosen-select'
				)
			)
		!!}
-->
		<select multiple="multiple" id="jobtitles" name="jobtitles[]" class="form-control chosen-select">
		@foreach ($jobTitles as $key => $value)
			<option value='{!! $key !!}' {{ $employee->present()->selectedJobTitles($key) }}>{{ $value  }}</option>
		@endforeach
		</select>
	</div>
</div>


<div class="form-group padding-bottom-xl">
	<label for="inputGrades" class="col-sm-2 control-label">{{ Lang::choice('kotoba::hr.grade', 2) }}:</label>
	<div class="col-sm-10">
<!--
		{!!
			Form::select(
				'grades[]',
				$grades,
				$employee->grade_id,
				array(
					'class' => 'form-control chosen-select',
					'data-placeholder' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.grade', 2),
					'multiple' => true
				)
			)
		!!}
-->
<!--
		<select multiple="multiple" id="departments" name="departments[]" class="form-control chosen-select">
		@foreach ($grades as $key => $value)
			<option value='{!! $key !!}' {{ $employee->present()->selectedGrades($key) }}>{{ $value  }}</option>
		@endforeach
		</select>
-->
		@foreach (App\Modules\Gakko\Http\Domain\Models\Grade::All() as $grade)
			<label class="checkbox-inline">
				<input type="checkbox" name="grades[]" value="{{ $grade->id }}" {{ $employee->present()->checkBoxGrades($grade->id) }}>
				{{ $grade->name }}
			</label>
		@endforeach
	</div>
</div>

<div class="form-group padding-bottom-xl">
	<label for="inputSubject" class="col-sm-2 control-label">{{ Lang::choice('kotoba::hr.subject', 2) }}:</label>
	<div class="col-sm-10">
<!--
		{!!
			Form::select(
				'subjects[]',
				$subjects,
				$employee->subject_id,
				array(
					'class' => 'form-control chosen-select',
					'data-placeholder' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.subject', 2),
					'multiple' => true
				)
			)
		!!}
-->
		<select multiple="multiple" id="subjects" name="subjects[]" class="form-control chosen-select">
		@foreach ($subjects as $key => $value)
			<option value='{!! $key !!}' {{ $employee->present()->selectedSubjects($key) }}>{{ $value  }}</option>
		@endforeach
		</select>
<!--
		@foreach (App\Modules\Gakko\Http\Domain\Models\Subject::All() as $subject)
			<label class="checkbox-inline">
				<input type="checkbox" name="subjects[]" value="{{ $subject->id }}" {{ $employee->present()->checkBoxSubjects($subject->id) }}>
				{{ $subject->name }}
			</label>
		@endforeach
-->
	</div>
</div>


{{--
<div class="form-group padding-bottom-xl">
	<label for="inputPosition" class="col-sm-2 control-label">{{ Lang::choice('kotoba::hr.position', 1) }}:</label>
	<div class="col-sm-10">
		{!!
			Form::select(
				'position_id',
				$positions,
				$employee->position_id,
				array(
					'class' => 'form-control chosen-select'
				)
			)
		!!}
	</div>
</div>
--}}

<div class="form-group padding-bottom-xl">
	<label for="inputSite" class="col-sm-2 control-label">{{ Lang::choice('kotoba::hr.site', 2) }}:</label>
	<div class="col-sm-10">
<!--
		{!!
			Form::select(
				'sites[]',
				$sites,
				$employee->site_id,
				array(
					'class' => 'form-control chosen-select',
					'data-placeholder' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.site', 2),
					'multiple' => true
				)
			)
		!!}
-->
		<select multiple="multiple" id="sites" name="sites[]" class="form-control chosen-select">
		@foreach ($sites as $key => $value)
			<option value='{!! $key !!}' {{ $employee->present()->selectedSites($key) }}>{{ $value  }}</option>
		@endforeach
		</select>
<!--
		@foreach (App\Modules\Gakko\Http\Domain\Models\Site::All() as $site)
			<label class="checkbox-inline">
				<input type="checkbox" name="sites[]" value="{{ $site->id }}" {{ $employee->present()->checkBoxSites($site->id) }}>
				{{ $site->name }}
			</label>
		@endforeach
-->
	</div>
</div>


<hr>


<div class="form-group padding-bottom-xl">
	<label for="inputIsSupervisior" class="col-sm-2 control-label">{{ trans('kotoba::hr.ask.isSupervisior') }}</label>
	<div class="col-sm-10">
		<label class="radio-inline">
			{!!
				Form::radio(
					'isSupervisior',
					'1',
					false,
					array(
						'id' => 'inputIsSupervisior'
					)
				)
			!!}
			{{ trans('kotoba::general.yes') }}
		</label>
		<label class="radio-inline">
			{!!
				Form::radio(
					'isSupervisior',
					'0',
					true,
					array(
						'id' => 'inputIsSupervisior'
					)
				)
			!!}
			{{ trans('kotoba::general.no') }}
		</label>
	</div>
</div>

<div class="form-group padding-bottom-xl">
	<label for="inputSupervisor" class="col-sm-2 control-label">{{ trans('kotoba::hr.supervisor') }}:</label>
	<div class="col-sm-10">
		{!!
			Form::select(
				'supervisor_id',
				$supervisors,
				$employee->supervisor_id,
				array(
					'class' => 'form-control chosen-select'
				)
			)
		!!}
	</div>
</div>


<hr>

<div class="form-group">
	<input class="btn btn-success btn-block" type="submit" value="{{ trans('kotoba::button.save') }}">
</div>

{!! Form::close() !!}


<div class="row">
<div class="col-sm-4">
	<a href="/employees" class="btn btn-default btn-block" title="{{ trans('kotoba::button.cancel') }}">
		<i class="fa fa-times fa-fw"></i>
		{{ trans('kotoba::button.cancel') }}
	</a>
</div>

<div class="col-sm-4">
	<input class="btn btn-default btn-block" type="reset" value="{{ trans('kotoba::button.reset') }}">
</div>

<div class="col-sm-4">
	<a class="btn btn-danger btn-block action_confirm" data-method="delete" title="{{ trans('kotoba::general.command.delete') }}" onclick="">
		<i class="fa fa-trash-o fa-fw"></i>
		{{ trans('kotoba::general.command.delete') }}
	</a>
</div>
</div>

</div> <!-- ./ row -->
</div> <!-- ./ wrap/container -->
@stop
