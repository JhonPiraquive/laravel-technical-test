<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Guest layout component for the application
 *
 * This component renders the guest layout view for unauthenticated users.
 *
 * @author Alejandro Piraquive <alejandro5.6@icloud.com>
 * @version October 05, 2024
 */
class GuestLayout extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
