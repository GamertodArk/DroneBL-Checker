## DroneBL Checker

This is a small PHP scripts that checks if a proxy is listed in the DroneBL's databases

## Usage
clone this repository 
```bash
$ git clone
```

Create a `.txt` file in the same directory that the `checker.php` file is located.

```
// Proxies.txt

1.1.1.1
78.36.6.224
81.211.94.210
111.206.6.101
212.192.202.207
82.137.244.151
```

In there, list all the prixie's ip that you want to check, please make sure not to add blank spaces and to end every proxy ip with a line break.

Next, just execute the `checker.php` file in the command line passing the `.txt` file that you created with the proxie's ip as a parameter
```bash
$ php checker.php Proxies.php
```

Then the `checker.php` file will send a request to the DroneBL site with every single proxy as a parameter and depending on the response you'll see an `OK` or `Fail`. An `OK` means that the proxy ip is NOT listed in the DroneBL servers, while a `FAIL` means that the ip IS listed in the DroneBL servers, and you have to request a removal.

```bash
Trying 1.1.1.1 ----> Ok
Trying 212.192.202.207 ----> Fail
Trying 82.137.244.151 ----> Fail
Trying 78.36.6.224 ----> Fail
Trying 81.211.94.210 ----> Fail
Trying 111.206.6.101 ----> Fail
```

Copyright @ Gamertod 2019 under the GPL2 license