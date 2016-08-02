#!/usr/bin/env python2

from selenium import webdriver
import time

url = "http://localhost"

while True:
    driver = webdriver.PhantomJS(executable_path=r'/usr/local/bin/phantomjs')
    driver.set_window_size(1120, 550)
    driver.get("{}/".format(url))
    element = driver.find_element_by_name("username")
    element.send_keys("admin")
    element = driver.find_element_by_name("password")
    element.send_keys("passwordgoeshere")
    driver.find_element_by_name("submit").click()
    driver.get("{}/messages_view.php".format(url))
    print driver.current_url
    driver.quit()
    del element
    del driver
    time.sleep(30)
