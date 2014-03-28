<?php

class CoursesController extends \BaseController {

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCourses()
    {
        $data = $this->course->all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
		$operation = Input::get('oper');
        switch ($operation) {
        case "add":
            $this->course->name = Input::get('name');
			$this->course->par = Input::get('par');
			$this->course->rating = Input::get('rating');
			$this->course->slope = Input::get('slope');
            $this->course->save();            
            break;
        case "edit":
            $id = Input::get('id');
            $this->course = $this->course->find($id);
            $this->course->name = Input::get('name');
			$this->course->par = Input::get('par');
			$this->course->rating = Input::get('rating');
			$this->course->slope = Input::get('slope');
            $this->course->save();
            break;
        case "del":
            $id = Input::get('id');
            $this->course = $this->course->destroy($id);
            break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}