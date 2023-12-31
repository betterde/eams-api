<?php

namespace App\Admin\Controllers;

use App\School;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Arr;
use Encore\Admin\Controllers\AdminController;

/**
 * Date: 2023/9/6
 * @author George
 * @package App\Admin\Controllers
 */
class SchoolController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'School';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new School());

        $statusEnums = [
            1 => 'Pending',
            2 => 'Approved',
            3 => 'Rejected'
        ];

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('status', __('Status'))->using($statusEnums)->dot([
            1 => 'primary',
            2 => 'success',
            3 => 'danger'
        ]);
        $grid->column('manager')->display(function ($manager) {
            return Arr::get($manager, 'name');
        });
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function ($filter) use ($statusEnums) {
            $filter->disableIdFilter();

            $filter->column(1/2, function ($filter) {
                $filter->equal('id', 'ID');
                $filter->like('name', 'Name');
            });

            $filter->column(1/2, function ($filter) use ($statusEnums) {
                $filter->equal('status', 'Status')->select($statusEnums);
                $filter->between('created_at', 'Created at')->datetime();
            });
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
        $show = new Show(School::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('status', __('Status'))->using([
            1 => 'Pending',
            2 => 'Approved',
            3 => 'Rejected'
        ]);
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
        $form = new Form(new School());

        $form->display('id', __('ID'));
        $form->select('status', 'Status')->options([1 => 'Pending', 2 => 'Approved', 3 => 'Rejected']);
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
