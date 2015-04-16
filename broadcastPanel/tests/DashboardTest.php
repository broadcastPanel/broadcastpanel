<?php

/**
 * @author   Liam Symonds <liam@broadcastpanel.com>
 * @version  1.0.0
 * @modified 16/04/2015
 *
 * Tests the functionality of the dashboard controller and
 * its calls in order to ensure that we get the most
 * reliable data possible. 
 **/
class DashboardTest extends TestCase
{
    
    /**
     * Tests whether the dashboard view can
     * be retrieved or not and if the status
     * URL is status: OK.
     *
     * @return void
     **/
    public function testCanGetDashboard()
    {
        $this->call('GET', '/dashboard/index');

        $this->assertResponseOk();
    }

} 

