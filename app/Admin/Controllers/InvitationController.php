<?php

namespace App\Admin\Controllers;

use App\Teacher;
use App\Invitation;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Arr;
use Encore\Admin\Controllers\AdminController;
use App\Admin\Actions\Teacher\SendNotification;

/**
 * Date: 2023/9/6
 * @author George
 * @package App\Admin\Controllers
 */
class InvitationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Invitation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Invitation());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('initiator', __('Initiator'))->display(function ($initiator) {
            return Arr::get($initiator, 'name');
        });
        $grid->column('email', __('Email'));
        $grid->column('expires', __('Expires in'))->display(function ($expires) {
            return date('Y-m-d H:i:s', $expires);
        });
        $grid->column('status', __('Status'))->using([
            1 => 'Unregistered',
            2 => 'Registered'
        ]);
        $grid->column('created_at', __('Created at'));

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();

            $filter->column(1/2, function ($filter) {
                $filter->equal('id', 'ID');
            });

            $filter->column(1/2, function ($filter) {
                $filter->like('email', 'Email');
            });
        });

        $grid->actions(function ($actions) {
            $actions->add(new SendNotification());
        });

        $grid->model()->orderBy('created_at', 'desc');

        $grid->disableActions();
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
        $show = new Show(Invitation::findOrFail($id));

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
        $form = new Form(new Invitation());

        $form->display('id', __('ID'));
        $form->display('name', __('Name'));
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
