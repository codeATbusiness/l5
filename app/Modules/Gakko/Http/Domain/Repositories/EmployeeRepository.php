<?php
namespace App\Modules\Gakko\Http\Domain\Repositories;

use App\Modules\Gakko\Http\Domain\Models\Employee;

use DB, Lang;
//use Hash, DB, Auth;
//use DateTime;
//use File, Auth;

class EmployeeRepository extends BaseRepository {

	/**
	 * The Module instance.
	 *
	 * @var App\Modules\ModuleManager\Http\Domain\Models\Module
	 */
	protected $employee;

	/**
	 * Create a new ModuleRepository instance.
	 *
   	 * @param  App\Modules\ModuleManager\Http\Domain\Models\Module $module
	 * @return void
	 */
	public function __construct(
		Employee $employee
		)
	{
		$this->model = $employee;
	}

	/**
	 * Get role collection.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function create()
	{

		$employeeTypes = $this->getEmployeeTypes();
		$employeeTypes = array('' => trans('kotoba::general.command.select_an') . '&nbsp;' . Lang::choice('kotoba::hr.employee_type', 2)) + $employeeTypes;

		$departments = $this->getDepartments();
//		$departments = array('' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.department', 2)) + $departments;

		$jobTitles = $this->getJobTitles();
		$jobTitles = array('' => trans('kotoba::general.command.select_a') . '&nbsp;' . Lang::choice('kotoba::hr.job_title', 1)) + $jobTitles;

		$supervisors = $this->getSupervisors();
		$supervisors = array('' => trans('kotoba::general.command.select_a') . '&nbsp;' . trans('kotoba::hr.supervisor')) + $supervisors;

		$grades = $this->getGrades();
//		$grades = array('' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.grade', 2)) + $grades;

		$subjects = $this->getSubjects();
//		$subjects = array('' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.subject', 2)) + $subjects;

		$positions = $this->getPositions();
		$positions = array('' => trans('kotoba::general.command.select_a') . '&nbsp;' . Lang::choice('kotoba::hr.position', 1)) + $positions;

		$sites = $this->getSites();
//		$sites = array('' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.site', 2)) + $sites;


		return compact(
			'employee',
			'employeeTypes',
			'departments',
			'jobTitles',
			'supervisors',
			'grades',
			'subjects',
			'positions',
			'sites'
			);
	}

	/**
	 * Get user collection.
	 *
	 * @param  string  $slug
	 * @return Illuminate\Support\Collection
	 */
	public function show($id)
	{
		$employee = $this->model->find($id);
//dd($module);

		return compact('employee');
	}

	/**
	 * Get user collection.
	 *
	 * @param  int  $id
	 * @return Illuminate\Support\Collection
	 */
	public function edit($id)
	{
		$employee = $this->model->find($id);
//dd($module);

		$employeeTypes = $this->getEmployeeTypes();
		$employeeTypes = array('' => trans('kotoba::general.command.select_an') . '&nbsp;' . Lang::choice('kotoba::hr.employee_type', 2)) + $employeeTypes;

		$departments = $this->getDepartments();
//		$departments = array('' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.department', 2)) + $departments;

		$jobTitles = $this->getJobTitles();
		$jobTitles = array('' => trans('kotoba::general.command.select_a') . '&nbsp;' . Lang::choice('kotoba::hr.job_title', 1)) + $jobTitles;

		$supervisors = $this->getSupervisors();
		$supervisors = array('' => trans('kotoba::general.command.select_a') . '&nbsp;' . trans('kotoba::hr.supervisor')) + $supervisors;

		$grades = $this->getGrades();
//		$grades = array('' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.grade', 2)) + $grades;

		$subjects = $this->getSubjects();
//		$subjects = array('' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.subject', 2)) + $subjects;

		$positions = $this->getPositions();
		$positions = array('' => trans('kotoba::general.command.select_a') . '&nbsp;' . Lang::choice('kotoba::hr.position', 1)) + $positions;

		$sites = $this->getSites();
//		$sites = array('' => trans('kotoba::general.command.select') . '&nbsp;' . Lang::choice('kotoba::hr.site', 2)) + $sites;


		return compact(
			'employee',
			'employeeTypes',
			'departments',
			'jobTitles',
			'supervisors',
			'grades',
			'subjects',
			'positions',
			'sites'
			);
	}

	/**
	 * Get all models.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function store($input)
	{
//dd($input);
		$this->model = new Employee;
		$this->model->create($input);
	}

	/**
	 * Update a role.
	 *
	 * @param  array  $inputs
	 * @param  int    $id
	 * @return void
	 */
	public function update($input, $id)
	{
//dd($input['enabled']);
		$employee = Employee::find($id);
		$employee->update($input);
	}


// Functions --------------------------------------------------

	public function getEmployeeTypes()
	{
		$employee_types = DB::table('employee_types')->lists('name', 'id');
		return $employee_types;
	}

	public function getDepartments()
	{
		$departments = DB::table('departments')->lists('name', 'id');
		return $departments;
	}

	public function getJobTitles()
	{
		$jobTitles = DB::table('job_titles')->lists('name', 'id');
		return $jobTitles;
	}

	public function getSupervisors()
	{
		$supervisiors = DB::table('users')->lists('email', 'id');
// 		$supervisiors = DB::table('profiles')
// 			->where('isSupervisior', '=', '1')
// 			->lists('email', 'id');

		return $supervisiors;
	}

	public function getGrades()
	{
		$grades = DB::table('grades')->lists('name', 'id');
		return $grades;
	}

	public function getSubjects()
	{
		$subjects = DB::table('subjects')->lists('name', 'id');
		return $subjects;
	}

	public function getPositions()
	{
		$positions = DB::table('positions')->lists('name', 'id');
		return $positions;
	}

	public function getSites()
	{
		$sites = DB::table('sites')->lists('name', 'id');
		return $sites;
	}

	public function getSupervisor($id)
	{
		$supervisor = DB::table('profiles')
			->where('user_id', '=', $id)
			->first();
		return $supervisor;
	}

	public function getDepartment($id)
	{
		$department = DB::table('departments')
			->where('id', '=', $id)
			->pluck('name');
		return $department;
	}

	public function getSite($id)
	{
		$site = DB::table('sites')
			->where('id', '=', $id)
			->pluck('name');
		return $site;
	}

	public function getPosition($id)
	{
		$position = DB::table('job_titles')
			->where('id', '=', $id)
			->pluck('name');
		return $position;
	}

	/**
	 * Has a user profile been associate to a site
	 *
	 * @param integer $id
	 *
	 * @return boolean
	 */
	public function hasSite($id)
	{

//dd($this->sites);
		foreach ($this->sites as $site)
		{
			if ($site->id == $id)
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Has a user profile been associate to a grade
	 *
	 * @param integer $id
	 *
	 * @return boolean
	 */
	public function hasGrade($id)
	{

//dd($this->grades);
		foreach ($this->grades as $grade)
		{
			if ($grade->id == $id)
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Has a user profile been associate to a department
	 *
	 * @param integer $id
	 *
	 * @return boolean
	 */
	public function hasDepartment($id)
	{

//dd($this->departments);
		foreach ($this->departments as $department)
		{
			if ($department->id == $id)
			{
				return true;
			}
		}

		return false;
	}


	/**
	 * Has a user profile been associate to a subject
	 *
	 * @param integer $id
	 *
	 * @return boolean
	 */
	public function hasSubject($id)
	{

//dd($this->subjects);
		foreach ($this->subjects as $subject)
		{
			if ($subject->id == $id)
			{
				return true;
			}
		}

		return false;
	}


	public function getIDbyEmail($email)
	{
		$id = DB::table('users')
			->where('email', '=', $email)
			->pluck('id');
		return $id;
	}


}
