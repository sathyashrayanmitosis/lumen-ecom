<?php


namespace Mitosis\Framework\Http\Controllers;

use Konekt\Address\Models\CountryProxy;
use Konekt\AppShell\Http\Controllers\BaseController;
use Konekt\Gears\Facades\Settings;
use Mitosis\Channel\Contracts\Channel;
use Mitosis\Channel\Models\ChannelProxy;
use Mitosis\Framework\Contracts\Requests\CreateChannel;
use Mitosis\Framework\Contracts\Requests\UpdateChannel;

class ChannelController extends BaseController
{
    public function index()
    {
        return view('mitosis::channel.index', [
            'channels' => ChannelProxy::paginate(100)
        ]);
    }

    public function create()
    {
        $channel                = app(Channel::class);
        $channel->configuration = ['country_id' => Settings::get('appshell.default.country')];

        return view('mitosis::channel.create', [
            'channel'   => $channel,
            'countries' => $this->getCountries(),
        ]);
    }

    public function store(CreateChannel $request)
    {
        try {
            $channel = ChannelProxy::create($request->all());
            flash()->success(__(':name has been created', ['name' => $channel->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('mitosis.channel.index'));
    }

    public function show(Channel $channel)
    {
        return view('mitosis::channel.show', ['channel' => $channel]);
    }

    public function edit(Channel $channel)
    {
        return view('mitosis::channel.edit', [
            'channel'   => $channel,
            'countries' => $this->getCountries(),
        ]);
    }

    public function update(Channel $channel, UpdateChannel $request)
    {
        try {
            $channel->update($request->all());

            flash()->success(__(':name has been updated', ['name' => $channel->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('mitosis.channel.index'));
    }

    public function destroy(Channel $channel)
    {
        try {
            $name = $channel->name;
            $channel->delete();

            flash()->warning(__(':name has been deleted', ['name' => $name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back();
        }

        return redirect(route('mitosis.channel.index'));
    }

    private function getCountries()
    {
        return CountryProxy::orderBy('name')->pluck('name', 'id');
    }
}
