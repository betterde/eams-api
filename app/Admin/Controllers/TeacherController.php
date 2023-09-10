<?php

namespace App\Admin\Controllers;

use App\Teacher;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\AdminController;
use App\Admin\Actions\Teacher\SendNotification;

/**
 * Date: 2023/9/6
 * @author George
 * @package App\Admin\Controllers
 */
class TeacherController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Teacher';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Teacher());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();

            $filter->column(1/2, function ($filter) {
                $filter->equal('id', 'ID');
                $filter->like('name', 'Name');
            });

            $filter->column(1/2, function ($filter) {
                $filter->like('email', 'Email');
                $filter->between('created_at', 'Created at')->datetime();
            });
        });

        $grid->actions(function ($actions) {
            $actions->add(new SendNotification());
        });

        $grid->model()->orderBy('created_at', 'desc');

        $grid->disableCreateButton();

        $grid->disableExport();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id): Show
    {
        $show = new Show(Teacher::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new Teacher());

        $form->display('id', __('ID'));
        $form->display('name', __('Name'));
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
