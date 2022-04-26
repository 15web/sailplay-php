#!/usr/bin/env bash

set -Eeuo pipefail

printf '#!/usr/bin/env sh\n\n./bin/run.bash composer check;\n' > .git/hooks/pre-commit;

chmod +x .git/hooks/pre-commit;
