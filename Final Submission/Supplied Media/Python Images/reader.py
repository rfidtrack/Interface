

#Replace with the address of the reader plugged into a PC
PC_LINKED_READER = '\x5E\x58\x77'

#Receive pings from tags
def tagping(address):
    txPwr(17)
    #Read signal
    lq = getLq()

    #Send tag id, signal, reader id to reader connected to server (via mesh network)
    rpc(PC_LINKED_READER, 'tagping_collect', address, lq, localAddr())
