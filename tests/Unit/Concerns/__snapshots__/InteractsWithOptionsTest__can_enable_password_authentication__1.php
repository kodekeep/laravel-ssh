<?php

return 'ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -o BatchMode=yes -p 22 user@127.0.0.1 \'bash -se\' << \\EOF-KK-SSH
whoami
EOF-KK-SSH';
