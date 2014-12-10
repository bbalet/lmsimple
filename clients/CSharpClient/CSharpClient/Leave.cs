using System;

namespace CSharpClient
{
    /// <summary>
    /// Basic Leave Object (as stored into LMSimple DB)
    /// </summary>
    public class LeaveDB
    {
        public int Id { get; set; }
        public DateTime StartDate { get; set; }
        public DateTime EndDate { get; set; }
        public int Status { get; set; }
        public int Employee { get; set; }
        public string Cause { get; set; }
        public string StartDateType { get; set; }
        public string EndDateType { get; set; }
        public double Duration { get; set; }
        public int Type { get; set; }
    }
}
