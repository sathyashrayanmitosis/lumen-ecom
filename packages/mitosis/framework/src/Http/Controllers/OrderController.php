<?php


namespace Mitosis\Framework\Http\Controllers;

use Konekt\AppShell\Http\Controllers\BaseController;
use Mitosis\Framework\Contracts\Requests\UpdateOrder;
use Mitosis\Order\Contracts\Order;
use Mitosis\Order\Models\OrderProxy;

class OrderController extends BaseController
{
    public function index()
    {
        return view('mitosis::order.index', [
            'orders' => OrderProxy::orderBy('created_at', 'desc')->paginate(100)
        ]);
    }

    public function show(Order $order)
    {
        return view('mitosis::order.show', ['order' => $order]);
    }

    public function update(Order $order, UpdateOrder $request)
    {
        try {
            $order->update($request->all());

            flash()->success(__('Order :no has been updated', ['no' => $order->number]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('mitosis.order.show', $order));
    }

    public function destroy(Order $order)
    {
        try {
            $number = $order->getNumber();
            $order->delete();

            flash()->warning(__('Order :no has been deleted', ['no' => $number]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back();
        }

        return redirect(route('mitosis.order.index'));
    }
}
