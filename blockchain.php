<?php

class Blockchain {
    private $chain;

    public function __construct() {
        $this->chain = array();
        $this->addGenesisBlock();
    }

    private function addGenesisBlock() {
        $this->chain[] = array(
            'index' => 0,
            'timestamp' => time(),
            'data' => 'Genesis Block',
            'previousHash' => '0'
        );
    }

    public function addBlock($data) {
        $index = count($this->chain);
        $previousBlock = $this->chain[$index - 1];
        $newBlock = array(
            'index' => $index,
            'timestamp' => time(),
            'data' => $data,
            'previousHash' => $this->calculateHash($previousBlock)
        );
        $this->chain[] = $newBlock;
    }

    private function calculateHash($block) {
        return sha1(json_encode($block));
    }

    public function isValid() {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            if ($currentBlock['previousHash'] !== $this->calculateHash($previousBlock)) {
                return false;
            }
        }
        return true;
    }

    public function getChain() {
        return $this->chain;
    }

    // Add function to log voting transaction to blockchain
    public function logVoteTransaction($voter, $candidate) {
        $index = count($this->chain);
        $previousBlock = $this->chain[$index - 1];
        $newBlock = array(
            'index' => $index,
            'timestamp' => time(),
            'data' => array(
                'voter' => $voter,
                'candidate' => $candidate
            ),
            'previousHash' => $this->calculateHash($previousBlock)
        );
        $this->chain[] = $newBlock;
    }
}

?>
