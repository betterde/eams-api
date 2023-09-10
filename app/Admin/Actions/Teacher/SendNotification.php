<?php

namespace App\Admin\Actions\Teacher;

use App\Teacher;
use App\Student;
use Illuminate\Http\Request;
use Encore\Admin\Actions\Response;
use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\SystemNotification;

class SendNotification extends RowAction
{
    public $name = 'SendNotify';

    /**
     * Date: 2023/9/10
     * @author George
     */
    public function form()
    {
        $this->text('content', 'Content')->rules(['required']);
    }

    /**
     * Date: 2023/9/10
     * @author George
     * @param Model $model
     * @param Request $request
     * @return Response
     */
    public function handle(Model $model, Request $request): Response
    {
        if ($model instanceof Teacher || $model instanceof Student) {
            $model->notify(new SystemNotification(['to' => $model->name, 'content' => $request->get('content')]));
        }

        return $this->response()->success('Success message.')->refresh();
    }

}