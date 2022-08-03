Using api vmmanager for servers
```php
$api = new vmsdk('url(in format https://url without last /)', 'apikey'); #initialization
$api->newvm($name, $cluster, $node, $storage, $account, $domain, $os, $password, $ram_mib, $hdd_mib, $cpu_number, $ipv4_number, $comment); #Create Virtual Machine
$api->ipv4($serverid); #Check server ip
$api->changeowner($serverid, $account); #Change Server Owner
$api->offserver($serverid); #Off Server
$api->startserver($serverid); #start Server
$api->restartserver($serverid); #restart Server
$api->repasswordserver($serverid, $password); #Change server password
```
