<?php
$RSYNC_OPTS = "-ltpDcuhRO --exclude /.sfs.conf --exclude /.sfs.mounted --delete-missing-args --delete-delay --files-from=%b %s %d";
$CONFIG = array(
"SYNC_DATA_NOREC" => "rsync -d --no-r $RSYNC_OPTS",
"SYNC_DATA_REC" => "rsync -r $RSYNC_OPTS",
"PULL_BATCHES" => "rsync -acduhRO --remove-source-files --include='./' --include='*.batch' --exclude='*' %s %d",
"ACCEPT_STATUS" => array(0, 24),
"NODES" => array(
  "node2" => array("DATA" => "rsync://node2:8173/data/",
                   "BATCHES" => "rsync://node2:8173/batches/"),
  "node3" => array("DATA" => "rsync://node3:8173/data/",
                   "BATCHES" => "rsync://node3:8173/batches/")
),

"PUSHPROCS" => 4,
"PUSHCOUNT" => 10,
"PULLCOUNT" => 3,

"BULK_OLDER_THAN" => 60,
"BULK_MAX_BATCHES" => 100,

"DATADIR" => "/mnt/data/",
"BATCHDIR" => "/mnt/batches",
"CHECKFILE" => "/mnt/data/.sfs.mounted",
"SCANTIME" => 1,
"FAILTIME" => 10,
"LOG_IDENT" => "sfs-sync(%n)",
"LOG_OPTIONS" => LOG_PID|LOG_CONS|LOG_PERROR,
"LOG_FACILITY" => LOG_DAEMON,
"LOG_DEBUG" => false,
"DRYRUN" => false
);
?>